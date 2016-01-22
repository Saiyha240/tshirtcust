<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model {

	public function user() {
		return $this->belongsTo( 'App\User' );
	}

	public function tshirts() {
		return $this->belongsToMany( 'App\Tshirt' )
		            ->withPivot( 'price', 'quantity' );
	}

	public function totalQuantity() {
		return $this->tshirts()->sum( 'quantity' );
	}

	public function totalPrice() {
		return DB::table( 'order_tshirt' )
		         ->select( DB::raw( 'sum(quantity*price) as total' ) )
		         ->where( 'order_id', '=', $this->id )
		         ->first()->total;
	}
}
