<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            User::factory()
                ->state(['email' => 'doctor'.$i.'@host.ru'])
                ->create();
        }
        for ($i = 1; $i <= 5; $i++) {
            User::factory()
                ->state(['email' => 'patient'.$i.'@host.ru'])
                ->create();
        }
    }
}
