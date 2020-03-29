<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Todo;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(User::class, 3)
        ->create()
        ->each(function ($user) {
            $todos = factory(Todo::class, 5)->make();
            $user->todos()->saveMany($todos);
        });
    }
}