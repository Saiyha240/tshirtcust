<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller {

	public function __construct() {
		$this->user = Auth::user();
	}

	public function index() {
		$orders = $this->user->orders()->get();

		return view( 'orders.index', compact( 'orders' ) );
	}

	public function show( $id ) {
		$order   = Order::find( $id );
		$tshirts = $order->tshirts()->get();
		$total   = $order->totalPrice();

		return view( 'orders.items', compact( 'tshirts', 'total' ) );
	}

	public function update($id){
		$order = Order::find( $id );

		$order->status = 1;
		$order->save();

		return Redirect::action( "AdminController@orders" )
									 ->with('f_message', 'Successfully updated status of Order id: ' . $order->id)
									 ->with('f_type', 'alert-success');
	}
}
