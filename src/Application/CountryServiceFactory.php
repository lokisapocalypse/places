<?php

namespace Fusani\Places\Application;

use Fusani\Places\Infrastructure\Persistence\InMemory;

class CountryServiceFactory
{
    public function createService()
    {
        $countryRepository = new InMemory\CountryRepository();
        return new CountryService($countryRepository);
    }
}
