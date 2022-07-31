<?php

namespace Database\Seeders;

use App\Models\Peoples;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Peoples::factory()->count(50000)->create();
    }
}
