<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Profile;
use PragmaRX\Countries\Package\Countries;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function getCountry()
    {
        $countries = new Countries();

        $allcountries = $countries->all();

        return CountryResource::collection($allcountries);
    }

    public function getState($country)
    {
        $countries = new Countries();

        $states = $countries->where('name.common', $country)
            ->first()
            ->hydrateStates()
            ->states
            ->sortBy('name')
            ->pluck('name');

        return new CountryResource($states);
    }

    public function getProfileCountry()
    {
       $profile = Profile::where('user_id', auth()->id())->get();

        return new CountryResource($profile);
    }

}
