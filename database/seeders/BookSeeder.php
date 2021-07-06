<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Specialist;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('id','>=',5)->get();
        $specialists = Specialist::where('id','<=',4)->get();
        foreach ($specialists as $specialist) {
            foreach ($users as $user) {
                Book::factory()
                    ->for($specialist)
                    ->for($user)
                    ->create();
            }
        }
    }
}
