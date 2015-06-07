<?php

namespace Fusani\Places;

use Fusani\Places\Application;
use Fusani\Places\SimpleTestCase;

/**
 * @covers Fusani\Places\Application\CountryServiceFactory
 */
class CountryServiceFactoryTest extends SimpleTestCase
{
    public function testCreateService()
    {
        $factory = new Application\CountryServiceFactory();
        $service = $factory->createService();

        $this->assertNotNull($service);
        $this->assertInstanceOf('Fusani\Places\Application\CountryService', $service);
    }
}
