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
        for ($i = 1; $i <= 20; $i++) {
            User::factory()
                ->state([
                    'email' => 'doctor'.$i.'@host.ru',
                    'is_doctor' => true
                ])
                ->create();
        }
        for ($i = 1; $i <= 10; $i++) {
            User::factory()
                ->state(['email' => 'patient'.$i.'@host.ru'])
                ->create();
        }
    }
}
