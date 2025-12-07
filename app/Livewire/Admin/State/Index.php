<?php

namespace App\Livewire\Admin\State;

use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $countrys = [];
    public $stateId;
    public $name;
    public $country;
    public function mount()
    {
        $this->countrys = Country::query()->select('id','name')->get();
    }

    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'name' => 'required|min:2|max:30|unique:states,name',
            'country' => 'required|exists:countries,id|string'
        ],[
            '*.required' => 'این فیلد ضرروری هست!!',
            '*.min' => 'لطفا بیشتر از 2 کارکتر وارد کنید!!',
            '*.max' => 'لطفا کمتر از 30 کاراکتر وارد کنید!!',
            '*.string' => 'مقدار وارد شده غیر مجازه!!',
            'name.unique' => 'این نام قبلا استفاده شده',
            '*.exists' => 'این فیلد ضرروری هست!!',

        ]);
        $validator->validate();

        State::query()->updateOrCreate(
            [
                'id' => $this->stateId
            ],
            [
                'name' => $formData['name'],
                'country_id' => $formData['country']
            ]
        );
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->reset('name','country');
        $this->resetValidation();
        $this->stateId = null;
    }

    public function edit($state_id)
    {
        $state = State::query()->where('id',$state_id)->first();
        if ($state)
        {
            $this->stateId = $state->id;
            $this->name = $state->name;
            $this->country = $state->country_id;
        }
    }

    public function delete($state_id)
    {
        $state = State::query()->where('id',$state_id)->first();
        if ($state)
        {
            $state->delete();
        }
        $this->dispatch('success','حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $states = State::query()
            ->with('country:id,name')
            ->paginate(10);
        return view('livewire.admin.state.index',[
            'states' => $states
        ])->layout('layouts.admin.app');
    }
}
