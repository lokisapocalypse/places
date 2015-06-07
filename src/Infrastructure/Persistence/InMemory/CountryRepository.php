<?php

namespace Fusani\Places\Infrastructure\Persistence\InMemory;

use Fusani\Places\Domain\Model\Country;

class CountryRepository implements Country\CountryRepository
{
    protected $countries;

    public function __construct()
    {
        $this->countries = [];

        chdir(__DIR__);

        if (($handle = fopen('../../../../data/countries.csv', 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $country = new Country\Country($data[1]);
                $country->changeCurrency($data[8], $data[7]);
                $country->changeIsoCodes($data[11], $data[10], $data[12], $data[9]);
                $country->changeLegalMetadata($data[6], $data[2], $data[5], $data[4], $data[3]);
                $country->changeTld($data[13]);
                $this->countries[$data[1]] = $country;
            }

            fclose($handle);
        }
    }

    public function all()
    {
        return $this->countries;
    }
}
