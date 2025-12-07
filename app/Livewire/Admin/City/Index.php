<?php

namespace App\Livewire\Admin\City;

use App\Models\City;
use App\Models\State;
use App\Repository\admin\Country_State_City\CountryStateCityAdminRepositoryInterface;
use App\services\admin\validation\serviceCountryStateCity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $cityId;
    public $name;
    public $state;
    public $states = [];
    private $repository;

    public function boot(CountryStateCityAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function mount()
    {
        $this->states = State::query()->select('id','name')->get();
    }

    public function submit($formData,serviceCountryStateCity $serviceCity)
    {
        $serviceCity->cityValidation($formData)->validate();
        $this->repository->submitCity($formData,$this->cityId);
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
