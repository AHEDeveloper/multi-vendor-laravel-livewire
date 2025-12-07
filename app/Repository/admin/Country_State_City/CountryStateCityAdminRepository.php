<?php

namespace App\Repository\admin\Country_State_City;

use App\Models\City;
use App\Models\Country;
use App\Models\State;

class CountryStateCityAdminRepository implements CountryStateCityAdminRepositoryInterface
{
    public function submitCountry($formData,$countryId)
    {
        Country::query()->updateOrCreate(
            [
                'id' => $countryId
            ],
            [
                'name' => $formData['name']
            ]);
    }
    public function submitState($formData,$stateId)
    {
        State::query()->updateOrCreate(
            [
                'id' => $stateId
            ],
            [
                'name' => $formData['name'],
                'country_id' => $formData['country']
            ]
        );
    }

    public function submitCity($formData,$cityId)
    {
        City::query()->updateOrCreate(
            [
                'id' => $cityId
            ],
            [
                'name' => $formData['name'],
                'state_id' => $formData['state']
            ]
        );
    }


}
