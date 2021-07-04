<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use DB;
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
        User::factory(2)->create();
        $this->call(DoctorSeeder::class);
    }
}
