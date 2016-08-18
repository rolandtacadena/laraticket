<?php

use App\Backlog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BacklogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Backlog::class, 10)->create();
        for($i = 1; $i <= 10; $i++) {
            DB::table('backlogs')->insert([
                'id' => $i,
                'name' => str_random(15),
                'description' => str_random(40),
            ]);
        }
    }
}
