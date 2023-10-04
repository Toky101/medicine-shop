<?php

namespace Database\Factories;

use Faker\Provider\Base;

class MyFactory extends Base
{
    protected static $categories = ['Analgesics', 'Antipyretics', 'Antibiotics', 'Antacids', 'Antimalarials', 'Antidiabetics', 'Respiratory', 'Cardiovascular', 'Supplements', 'Antiparasitics'];

    protected static $manufacturers = ['MediTech Pharma', 'BioHealth Laboratories', 'VitaCure Pharmaceuticals', 'GeneSolutions Inc.', 'MediGenix Therapeutics', 'LifeScience Innovators', 'CureWave Pharmaceuticals', 'Healix Laboratories', 'VitalMed Pharmaceuticals', 'BioPharm Innovations'];

    public function category(): string
    {
        return static::randomElement(static::$categories);
    }

    public function manufacturer(): string
    {
        return static::randomElement(static::$manufacturers);
    }
}
