<?php

use App\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('carts')->delete();

	    Cart::create([
		    'user_id' => 2
	    ]);

	    Cart::create([
		    'user_id' => 3
	    ]);
    }
}
