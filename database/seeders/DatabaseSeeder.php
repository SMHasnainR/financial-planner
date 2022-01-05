<?php

namespace Database\Seeders;

use App\Models\Month;
use App\Models\User;
use App\Models\Week;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        // Week::factory(5)->create();
        Month::factory(12)->create();
    }
}
