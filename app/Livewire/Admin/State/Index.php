<?php

namespace App\Livewire\Admin\State;

use App\Models\Country;
use App\Models\State;


use App\Repository\admin\Country_State_City\CountryStateCityAdminRepositoryInterface;
use App\services\admin\validation\serviceCountryStateCity;
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
    private $repository;

    public function boot(CountryStateCityAdminRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function mount()
    {
        $this->countrys = Country::query()->select('id','name')->get();
    }

    public function submit($formData,serviceCountryStateCity $serviceState)
    {

        $serviceState->stateValidation($formData)->validate();
        $this->repository->submitState($formData,$this->stateId);
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
