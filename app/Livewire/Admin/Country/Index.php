<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name;
    public $countryId;

    public function submit($formData)
    {
        $validate = Validator::make($formData, [
            'name' => 'required|max:50'
        ], [
            'name.required' => 'نام کشور ضرروری هست',
            'name.max' => 'لظفا کمتر از 50 کاراکتر استفاده کنید'
        ]);
        $validate->validate();
        Country::query()->updateOrCreate(
            [
                'id' => $this->countryId
            ],
            [
            'name' => $formData['name']
            ]);
        $this->dispatch('success','عملیات با موفقیت انجام شد');
        $this->reset('name');
        $this->resetValidation();
        $this->countryId = null;
    }

    public function edit($country_id)
    {
        $country = Country::query()->where('id',$country_id)->first();
        if ($country)
        {
            $this->countryId = $country->id;
            $this->name = $country->name;
        }
    }

    public function delete($country_id)
    {
        $country = Country::query()->where('id',$country_id)->first();
        if ($country)
        {
            $country->delete();
        }
        $this->dispatch('success','عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $countries = Country::query()->select('id', 'name')->paginate(10);
        return view('livewire.admin.country.index', [
            'countries' => $countries
        ])->layout('layouts.admin.app');
    }
}
