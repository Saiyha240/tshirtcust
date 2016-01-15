<?php

namespace App\Http\Controllers;

use App\Tshirt;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
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

trait PaypalHandler
{

	public function getContext()
	{
		$paypal_conf = Config::get('paypal');

		$context = new ApiContext( new OAuthTokenCredential( $paypal_conf['client_id'], $paypal_conf['secret'] ) );
		$context->setConfig( $paypal_conf['settings'] );

		return $context;

	}

	public function makePayment($id)
	{
		$context = $this->getContext();

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$item_1 = new Item();
		$item_1 ->setName('Item 1')
		        ->setCurrency('PHP')
		        ->setQuantity('1')
		        ->setPrice('100');

		$item_2 = new Item();
		$item_2 ->setName('Item 2')
		        ->setCurrency('PHP')
		        ->setQuantity('1')
		        ->setPrice('500');

		$item_list = new ItemList();
		$item_list->setItems([$item_1, $item_2]);

		$amount = new Amount();
		$amount ->setCurrency('PHP')
		        ->setTotal('600');

		$transaction = new Transaction();
		$transaction->setAmount( $amount )
		            ->setItemList( $item_list)
		            ->setDescription( 'Item Descriptionzzzz' );

		$redirect_urls = new RedirectUrls();
		$redirect_urls  ->setReturnUrl( URL::route('tshirts.status', [$id]) )
		                ->setCancelUrl( URL::route('tshirts.status', [$id]) );

		$payment = new Payment();
		$payment->setIntent('Sale')
		        ->setPayer( $payer )
		        ->setRedirectUrls( $redirect_urls )
		        ->setTransactions( [$transaction] );

		try{
			$payment->create( $context );
		}catch (PayPalConnectionException $e){
			if( Config::get('app.debug') )
			{
				echo "Exception: " . $e->getMessage() . PHP_EOL;
				exit();
			}else{
				die('Some Error occurred');
			}
		}
		foreach( $payment->getLinks() as $link ) {
			if ( $link->getRel() == 'approval_url' )
			{
				$redirect_url = $link->getHref();
				break;
			}

		}

		Session::put('paypal_payment_id', $payment->getId());

		if( isset( $redirect_url ) )
		{
			return Redirect::away($redirect_url);
		}

		return Redirect::route('tshirts.index')
		               ->with('f_message', 'Problem creating payment')
		               ->with('f_type', 'alert-danger');
	}

	public function executePayment($request, $id)
	{
		$context = $this->getContext();

		$payment_id = Session::get('paypal_payment_id');

		Session::forget('paypal_payment_id');

		if( empty( $request->PayerID ) || empty( $request->token ) )
		{
			return Redirect::route('tshirts.index')
			               ->with('f_message', 'Payer cancelled payment')
			               ->with('f_type', 'alert-danger');
		}

		$payment = Payment::get( $payment_id, $context );

		$execution = new PaymentExecution();
		$execution->setPayerId( $request->PayerID );

		$result = $payment->execute( $execution, $context );

		if( $result->getState() == 'approved' )
		{
			$tshirt = Tshirt::find($id);

			$tshirt->paid = true;
			$tshirt->payment_data = $result;

			$tshirt->save();

			return Redirect::route('tshirts.index')
			               ->with('f_message', 'Payment Success!')
			               ->with('f_type', 'alert-success');
		}

		return Redirect::route('tshirts.index')
		               ->with('f_message', 'Payment Failed!')
		               ->with('f_type', 'alert-danger');
	}
}