<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Config;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller {

	public function __construct() {
		$this->user = Auth::user();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$cart = Cart::firstOrCreate( [ 'user_id' => $this->user->id ] );

		$items = $cart->cartItems;
		$price = Config::key( 'price' )->value;
		$total = count( $items ) * $price;

		return view( 'cart.view', compact( 'items', 'price', 'total' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request, $tshirtId ) {
		$cart = Cart::firstOrCreate( [ 'user_id' => $this->user->id ] );


		$cartItem = CartItem::firstOrNew( [
			'tshirt_id' => $tshirtId,
			'cart_id'   => $cart->id
		] );

		if ( $cartItem->exists ) {
			$cartItem->quantity += 1;
		}

		$cartItem->save();

		return redirect( '/cart' );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $id ) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( $id ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, $id ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( $id ) {
		CartItem::destroy( $id );

		return redirect( '/cart' );
	}
}
