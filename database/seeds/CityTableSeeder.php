<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cities")->insert([
            ["name" => "Jaipur"],
            ["name" => "Bharatpur"],
            ["name" => "Udaipur"],
            ["name" => "Jodhpur"],
            ["name" => "Kota"],
        ]);
    }
}
