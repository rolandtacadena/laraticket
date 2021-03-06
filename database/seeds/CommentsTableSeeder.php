<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Comment::class, 10)->create();
        for($i = 1; $i <= 10; $i++) {
            DB::table('comments')->insert([
                'id' => $i,
                'user_id' => 1,
                'ticket_id' => 1,
                'comment' => str_random(30),
                'user_id' => 1,
                'ticket_id' => 1,
            ]);
        }
    }
}
