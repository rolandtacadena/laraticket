<?php

use App\Ticket;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Ticket::class, 10)->create();
        for($i = 1; $i <= 10; $i++) {
            DB::table('tickets')->insert([
                'user_id' => '1',
                'backlog_id' => 1,
                'title' => str_random(15),
                'description' => str_random(30),
                'type' => 'task',
                'priority' => 'low',
                'status' => 'open',
                'dev_loe' => random_int(1, 100),
                'description' => str_random(30),
            ]);
        }
    }
}
