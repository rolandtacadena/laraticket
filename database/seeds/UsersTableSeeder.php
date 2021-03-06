<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array(
                'id'        => 1,
                'name'      => 'admin',
                'role'      => 'admin',
                'email'     => 'admin@admin.com',
                'password'  => Hash::make('admin'),
            ),
            array(
                'id'        => 2,
                'name'      => 'user',
                'role'   => 'developer',
                'email'      => 'user@user.com',
                'password'   => Hash::make('user'),
            )
        );
        DB::table('users')->insert( $users );
    }
}
