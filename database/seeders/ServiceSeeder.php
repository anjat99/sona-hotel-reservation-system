<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $services = [
        "Free WIFI",
        "television",
        "24h butler service",
        "room service",
        "minibar",
        "2 Bathrooms"
    ];

    public function run()
    {
        foreach ($this->services as $service) {
            DB::table('services')->insert([
                "name" => $service
            ]);
        }
    }
}
