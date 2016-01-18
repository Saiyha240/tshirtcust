<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model {

	protected $fillable = [ 'cart_id', 'tshirt_id' ];

	public function cart() {
		return $this->belongsTo( 'App\Cart' );
	}

	public function tshirt() {
		return $this->belongsTo( 'App\Tshirt' );
	}
}
