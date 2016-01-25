<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartItem;
use App\Config;
use App\Tshirt;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class CartController extends Controller {

	use PaypalServiceTrait;

	public function __construct() {
		$this->user = Auth::user();
	}

	public function index() {
		$cart = Cart::firstOrCreate( [ 'user_id' => $this->user->id ] );

		$items = $cart->cartItems;
		$price = Config::key( 'price' )->value;
		$total = count( $items ) * $price;

		return view( 'cart.view', compact( 'items', 'price', 'total' ) );
	}

	public function addItem( Request $request, $tshirtId ) {
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


	public function emptyCart() {

	}

	public function removeItem( $id ) {
		CartItem::destroy( $id );

		return redirect()->action( 'CartController@index' );
	}

	public function pay( Request $request ) {
		$items = $this->mergeCartItemsData(
			$request->get( 'tshirt_id' ),
			$request->get( 'tshirt_price' ),
			$request->get( 'tshirt_quantity' )
		);
		// print_r(array_values($items));
		return $this->makePayment( $this->user->id, $items );
	}

	public function status( Request $request, $user_id ) {
		if( $this->user->id != $user_id ){
			return redirect()->action('CartController@index');
		}
		return $this->executePayment( $request );
	}

	private function mergeCartItemsData( $ids, $prices, $quantity ) {
		return collect( $ids )->map( function ( $item, $key ) use ( $prices, $quantity ) {
			$tshirt = Tshirt::find( $item );

			return [
				'sku'      => $tshirt->id,
				'name'     => $tshirt->name,
				'price'    => $prices[ $key ],
				'quantity' => $quantity[ $key ]
			];
		} )->all();
	}
}
