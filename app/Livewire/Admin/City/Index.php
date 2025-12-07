<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $cityId;
    public $name;
    public $state;
    public $states = [];
    public function mount()
    {
        $this->states = State::query()->select('id','name')->get();
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
           'name' => 'required|min:2|max:30|unique:cities,name' ,
           'state' => 'required|exists:states,id'
        ],[
            '*.required' => 'این فیلد ضرروری هست',
            '*.min' => 'لطفا بیشتر از 2 کاراکتر وارد کنید',
            '*.max' => 'لطفا کمتر از 3 کاراکتر وارد کنید',
            'name.unique' => 'این نام قبلا استفاده شده',
            'state.exists' => 'این گزینه نا معتبر هست',
        ]);
        $validator->validate();
        City::query()->updateOrCreate(
            [
                'id' => $this->cityId
            ],
            [
                'name' => $formData['name'],
                'state_id' => $formData['state']
            ]
        );
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->reset('name','state');
        $this->resetValidation();
        $this->cityId = null;
    }

    public function edit($city_id)
    {
        $city = City::query()->where('id',$city_id)->first();
        if ($city)
        {
            $this->cityId = $city->id;
            $this->name = $city->name;
            $this->state = $city->state_id;
        }
    }

    public function delete($city_id)
    {
        $city = City::query()->where('id',$city_id)->first();
        if ($city)
        {
            $city->delete();
        }
        $this->dispatch('success','عملیات خذف انجام شد');
    }

    public function render()
    {
        $citys = City::query()
            ->with('state:id,name')
            ->paginate(10);
        return view('livewire.admin.city.index',[
            'citys' => $citys
        ])->layout('layouts.admin.app');
    }
}
