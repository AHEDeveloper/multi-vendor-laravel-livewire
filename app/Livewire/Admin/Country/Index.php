<?php

namespace App\Livewire\Admin\Country;

use App\Models\Country;


use App\Repository\admin\Country_State_City\CountryStateCityAdminRepositoryInterface;
use App\services\admin\validation\serviceCountryStateCity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name;
    public $countryId;
    private $repository;
    public function boot(CountryStateCityAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function submit($formData,serviceCountryStateCity $serviceCountry)
    {
        $serviceCountry->countryValidation($formData)->validate();
        $this->repository->submitCountry($formData,$this->countryId);
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
