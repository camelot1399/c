<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SpecialistSeeder::class,
            BookSeeder::class,
            FeedbackSeeder::class,
//            DoctorSeeder::class,
//            ScoreSeeder::class,
        ]);
    }
}
