<?php

use App\Backlog;
use Illuminate\Database\Seeder;

class BacklogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Backlog::class, 10)->create();
    }
}
