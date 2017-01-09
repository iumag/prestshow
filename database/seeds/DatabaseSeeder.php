<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CityTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(HolidayTableSeeder::class);
        $this->call(HotelTableSeeder::class);
        $this->call(PhotographerTableSeeder::class);
        $this->call(TransportTableSeeder::class);
    }
}
