<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
	    $this->call(TshirtTableSeeder::class);
	    $this->call(OrderTableSeeder::class);
	    $this->call(OrderTshirtTableSeeder::class);

//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();
    }
}
