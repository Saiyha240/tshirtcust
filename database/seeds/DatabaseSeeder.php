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

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
	    $this->call(TshirtTableSeeder::class);
	    $this->call(OrderTableSeeder::class);
	    $this->call(OrderTshirtTableSeeder::class);
	    $this->call(ConfigSeeder::class);

        Model::reguard();
    }
}
