<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();

        User::create([
            'role_id'           => 1,
            'username'          => 'admin',
            'email'             => 'admin@tshirtcust.com',
            'password'          => bcrypt('123qwe'),
            'gender'            => 'M',
	        'contact_number'    => '0917-123-45-67'
        ]);

        User::create([
            'role_id'           => 2,
            'username'          => 'userA',
            'email'             => 'userA@tshirtcust.com',
            'password'          => bcrypt('123qwe'),
            'gender'            => 'M',
	        'contact_number'    => '0918-123-45-67'
        ]);

        User::create([
            'role_id'           => 2,
            'username'          => 'userB',
            'email'             => 'userB@tshirtcust.com',
            'password'          => bcrypt('123qwe'),
            'gender'            => 'F',
	        'contact_number'    => '0919-123-45-67'
        ]);
    }
}
