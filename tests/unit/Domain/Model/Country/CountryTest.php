<?php

namespace Fusani\Places;

use Fusani\Places\Domain\Model\Country\Country;
use PHPUnit_Framework_Assert;

/**
 * @covers Fusani\Places\Domain\Model\Country\Country
 */
class CountryTest extends SimpleTestCase
{
    protected $country;

    public function setup()
    {
        $this->country = new Country('Latveria');
    }

    public function testConstructor()
    {
        $this->assertEquals('Latveria', PHPUnit_Framework_Assert::readAttribute($this->country, 'name'));
    }

    public function testChangeCurrency()
    {
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'currency'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'currencyCode'));

        $this->country->changeCurrency('Doom dollars', 'DD');

        $this->assertEquals('Doom dollars', PHPUnit_Framework_Assert::readAttribute($this->country, 'currency'));
        $this->assertEquals('DD', PHPUnit_Framework_Assert::readAttribute($this->country, 'currencyCode'));
    }

    public function testChangeIsoCodes()
    {
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'isoAlphaCode'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'isoCode'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'isoNumber'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'telephoneCode'));

        $this->country->changeIsoCodes('LAT', 'LA', '919', '666');

        $this->assertEquals('LAT', PHPUnit_Framework_Assert::readAttribute($this->country, 'isoAlphaCode'));
        $this->assertEquals('LA', PHPUnit_Framework_Assert::readAttribute($this->country, 'isoCode'));
        $this->assertEquals('919', PHPUnit_Framework_Assert::readAttribute($this->country, 'isoNumber'));
        $this->assertEquals('666', PHPUnit_Framework_Assert::readAttribute($this->country, 'telephoneCode'));
    }

    public function testChangeLegalMetadata()
    {
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'capital'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'formalName'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'sovereignty'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'subType'));
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'type'));

        $this->country->changeLegalMetadata('Doom City', 'Latveria', 'Dr. Doom', 'Federation', 'Territory');

        $this->assertEquals('Doom City', PHPUnit_Framework_Assert::readAttribute($this->country, 'capital'));
        $this->assertEquals('Latveria', PHPUnit_Framework_Assert::readAttribute($this->country, 'formalName'));
        $this->assertEquals('Dr. Doom', PHPUnit_Framework_Assert::readAttribute($this->country, 'sovereignty'));
        $this->assertEquals('Federation', PHPUnit_Framework_Assert::readAttribute($this->country, 'subType'));
        $this->assertEquals('Territory', PHPUnit_Framework_Assert::readAttribute($this->country, 'type'));
    }

    public function testChangeTld()
    {
        $this->assertNull(PHPUnit_Framework_Assert::readAttribute($this->country, 'tld'));

        $this->country->changeTld('.doom');

        $this->assertEquals('.doom', PHPUnit_Framework_Assert::readAttribute($this->country, 'tld'));
    }

    public function testProvideIsoCodeInterestNoIsoCode()
    {
        $expected = [
            'isoCode' => null,
            'name' => 'Latveria',
        ];
        $this->assertEquals($expected, $this->country->provideIsoCodeInterest());
    }

    public function testProvideIsoCodeInterestWithAnIsoCode()
    {
        $this->country->changeIsoCodes('LAT', 'LA', '919', '666');
        $expected = [
            'isoCode' => 'LA',
            'name' => 'Latveria',
        ];
        $this->assertEquals($expected, $this->country->provideIsoCodeInterest());
    }
}
