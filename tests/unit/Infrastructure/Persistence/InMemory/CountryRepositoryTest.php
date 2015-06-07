<?php

namespace Fusani\Places;

use Fusani\Places\Infrastructure\Persistence\InMemory\CountryRepository;
use PHPUnit_Framework_Assert;

/**
 * @covers Fusani\Places\Infrastructure\Persistence\InMemory\CountryRepository
 */
class CountryRepositoryTest extends SimpleTestCase
{
    protected $repository;

    public function setup()
    {
        $this->repository = new CountryRepository();
    }

    public function testConstructor()
    {
        $this->assertNotEmpty(PHPUnit_Framework_Assert::readAttribute($this->repository, 'countries'));
    }

    public function testAll()
    {
        $this->assertNotEmpty($this->repository->all());
    }
}
