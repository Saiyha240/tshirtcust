<?php

use App\Order;
use App\Tshirt;
use Illuminate\Database\Seeder;

class OrderTshirtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('order_tshirt')->delete();

	    Order::find(1)->tshirts()->attach(1, ['price' => 10, 'quantity' => 1]);
	    Order::find(1)->tshirts()->attach(2, ['price' => 20, 'quantity' => 2]);

	    Order::find(2)->tshirts()->attach(3, ['price' => 30, 'quantity' => 3]);
	    Order::find(2)->tshirts()->attach(4, ['price' => 40, 'quantity' => 4]);

    }
}
