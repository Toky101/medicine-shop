<?php

namespace Database\Seeders;

use Database\Factories\ManufacturerFactory;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ManufacturerFactory::new()->count(10)->create();

    }
}
