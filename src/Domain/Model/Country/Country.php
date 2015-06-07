<?php

namespace Fusani\Places\Domain\Model\Country;

class Country
{
    protected $capital;
    protected $currency;
    protected $currencyCode;
    protected $formalName;
    protected $isoAlphaCode;
    protected $isoCode;
    protected $isoNumber;
    protected $name;
    protected $sovereignty;
    protected $subType;
    protected $telephoneCode;
    protected $tld;
    protected $type;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function changeCurrency($currency, $currencyCode)
    {
        $this->currency = $currency;
        $this->currencyCode = $currencyCode;
    }

    public function changeIsoCodes($isoAlphaCode, $isoCode, $isoNumber, $telephoneCode)
    {
        $this->isoAlphaCode = $isoAlphaCode;
        $this->isoCode = $isoCode;
        $this->isoNumber = $isoNumber;
        $this->telephoneCode = $telephoneCode;
    }

    public function changeLegalMetadata($capital, $formalName, $sovereignty, $subType, $type)
    {
        $this->capital = $capital;
        $this->formalName = $formalName;
        $this->sovereignty = $sovereignty;
        $this->subType = $subType;
        $this->type = $type;
    }

    public function changeTld($tld)
    {
        $this->tld = $tld;
    }

    public function provideIsoCodeInterest()
    {
        return [
            'isoCode' => $this->isoCode,
            'name' => $this->name,
        ];
    }
}
