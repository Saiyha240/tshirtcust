<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
	    DB::table('orders')->delete();

	    $orderA = new Order();
	    $orderA->user_id = 2;
	    $orderA->save();

	    $orderB = new Order();
	    $orderB->user_id = 3;
	    $orderB->save();
    }
}
