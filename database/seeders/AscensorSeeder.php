<?php

use Illuminate\Database\Seeder;
use App\Models\Ascensor;

class AscensorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Ascensor::factory()->count(10)->create();
    }
}
