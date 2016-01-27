<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller {
	//
	public function __construct() {
		$this->user = Auth::user();
	}

	public function update( ) {
		$tshirt_id       = $_POST['tshirt_id'];
		$tshird_quantity = $_POST['tshirt_quantity'];

		$cart_item           = $this->user->cartItems()->where( 'tshirt_id', $tshirt_id )->first();
		$cart_item->quantity = $tshird_quantity;
		$cart_item->save();

		redirect()->action( 'CartController@index' );
	}
}
