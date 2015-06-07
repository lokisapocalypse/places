<?php

namespace Fusani\Places\Application;

use Fusani\Places\Domain\Model\Country;

class CountryService
{
    protected $countryRepository;

    public function __construct(Country\CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function displayCountriesWithIsoCodes()
    {
        $countries = $this->countryRepository->all();
        return array_map(function ($country) {
            return $country->provideIsoCodeInterest();
        }, $countries);
    }
}
