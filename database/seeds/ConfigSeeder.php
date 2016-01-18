<?php

use App\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('configs')->delete();

		Config::create([
			'key'               => 'price',
			'value'             => '500',
			'display_name'      => 'Tshirt Price',
		]);
    }
}
