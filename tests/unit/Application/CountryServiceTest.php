<?php

namespace Fusani\Places;

use Fusani\Places\Application;
use Fusani\Places\SimpleTestCase;

/**
 * @covers Fusani\Places\Application\CountryService
 */
class CountryServiceTest extends SimpleTestCase
{
    protected $service;

    public function setup()
    {
        $factory = new Application\CountryServiceFactory();
        $this->service = $factory->createService();
    }

    public function testDisplayCountriesWithIsoCodes()
    {
        $countries = $this->service->displayCountriesWithIsoCodes();
        $this->assertNotNull($countries);

        foreach ($countries as $country) {
            $this->assertNotNull($country['isoCode']);
            $this->assertNotNull($country['name']);
        }
    }
}
