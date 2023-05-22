<?php

namespace Database\Seeders;

use App\Models\people;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        people::factory()
            ->count(200)
            ->create();
    }
}
