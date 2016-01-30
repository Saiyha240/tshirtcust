<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

trait PaypalServiceTrait {

	public function getContext() {
		$paypal_conf = Config::get( 'paypal' );

		$context = new ApiContext( new OAuthTokenCredential( $paypal_conf[ 'client_id' ], $paypal_conf[ 'secret' ] ) );
		$context->setConfig( $paypal_conf[ 'settings' ] );

		return $context;

	}

	public function makePayment( $user_id, $user_items ) {

		$context = $this->getContext();

		$payer = new Payer();
		$payer->setPaymentMethod( 'paypal' );

		$item_list = new ItemList();

		foreach ( $user_items as $item ) {

			$paypalItem = new Item();
			$paypalItem->setName( $item[ "name" ] )
			           ->setSku( $item[ "sku" ] )
			           ->setQuantity( $item[ "quantity" ] )
			           ->setPrice( $item[ "price" ] )
			           ->setCurrency( 'PHP' );

			$item_list->addItem( $paypalItem );
		}

		$amount = new Amount();
		$amount->setCurrency( 'PHP' )
		       ->setTotal( $this->getSystemPrice() * $this->getTotalQuantity( $user_items ) );

		$transaction = new Transaction();
		$transaction->setAmount( $amount )
		            ->setItemList( $item_list )
		            ->setDescription( 'Tshirt Checkout' );

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl( action( 'CartController@status', [ 'user' => Auth::user()->id ] ) )
		              ->setCancelUrl( action( 'CartController@status', [ 'user' => Auth::user()->id ] ) );

		$payment = new Payment();
		$payment->setIntent( 'Sale' )
		        ->setPayer( $payer )
		        ->setRedirectUrls( $redirect_urls )
		        ->setTransactions( [ $transaction ] );

		try {
			$payment->create( $context );
		} catch ( PayPalConnectionException $e ) {
			if ( Config::get( 'app.debug' ) ) {
				echo $e->getCode();
				echo $e->getData();
				exit();
			} else {
				die( 'Some Error occurred' );
			}
		}
		foreach ( $payment->getLinks() as $link ) {
			if ( $link->getRel() == 'approval_url' ) {
				$redirect_url = $link->getHref();
				break;
			}

		}

		Session::put( 'paypal_payment_id', $payment->getId() );

		if ( isset( $redirect_url ) ) {
			return Redirect::away( $redirect_url );
		}

		return Redirect::route( 'tshirts.index' )
		               ->with( 'f_message', 'Problem creating payment' )
		               ->with( 'f_type', 'alert-danger' );
	}

	public function executePayment( $request ) {
		$context = $this->getContext();

		$payment_id = Session::get( 'paypal_payment_id' );

		Session::forget( 'paypal_payment_id' );

		if ( empty( $request->PayerID ) || empty( $request->token ) || strcmp( $payment_id, $request->paymentId ) != 0 ) {
			return Redirect::route( 'tshirts.index' )
			               ->with( 'f_message', 'Error in payment' )
			               ->with( 'f_type', 'alert-danger' );
		}

		$payment = Payment::get( $payment_id, $context );

		$execution = new PaymentExecution();
		$execution->setPayerId( $request->PayerID );

		$result = $payment->execute( $execution, $context );

		if ( $result->getState() == 'approved' ) {
			$order = new Order();

			$order->user()->associate( Auth::user() );
			$order->payer_id      = $request->PayerID;
			$order->payment_id    = $payment_id;
			$order->payment_token = $request->token;
			$order->payment_data  = $result;
			$order->save();

			$this->addItemsToOrder( $order, Auth::user()->cartItems()->get() );
			$this->deleteCartItems();

			return Redirect::route( 'tshirts.index' )
			               ->with( 'f_message', 'Payment Success! You can view your order on My Orders page. ' )
			               ->with( 'f_type', 'alert-success' );
		}

		return Redirect::route( 'tshirts.index' )
		               ->with( 'f_message', 'Payment Failed!' )
		               ->with( 'f_type', 'alert-danger' );
	}

	private function getTotalQuantity( $user_items ) {
		return collect( $user_items )->reduce( function ( $prev, $next ) {
			return $prev + $next[ "quantity" ];
		}, 0 );
	}

	private function getSystemPrice() {
		return \App\Config::key( 'price' )->value;
	}

	private function addItemsToOrder( $order, $cart_items ) {
		$price = $this->getSystemPrice();
		collect( $cart_items )->each( function ( $item ) use ( $order, $price ) {
			$order->tshirts()->attach( $item->tshirt_id, [
				'price'    => $price,
				'quantity' => $item->quantity
			] );
		} );
	}

	private function deleteCartItems() {
		return Auth::user()->cartItems()->delete();
	}
}
