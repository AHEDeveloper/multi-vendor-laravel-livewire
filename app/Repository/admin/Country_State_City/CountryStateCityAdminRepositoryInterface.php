<?php

namespace App\Repository\admin\Country_State_City;

interface CountryStateCityAdminRepositoryInterface
{
    public function submitCountry($formData,$countryId);
    public function submitState($formData,$stateId);
    public function submitCity($formData,$cityId);

}
