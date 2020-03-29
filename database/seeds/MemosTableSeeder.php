<?php

use Illuminate\Database\Seeder;
use App\Memo;

class MemosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Memo::class, 3)
        ->create();
    }
}