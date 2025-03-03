<?php

namespace Database\Seeders;
 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Job;
use App\Models\jobType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        // Category::factory(5)->create();
        // jobType::factory(5)->create();

        // Job::factory()->count(15)->create();
        User::factory(10)->create();
    }
}
