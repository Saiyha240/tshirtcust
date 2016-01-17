<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('User');
    }

    public function tshirts()
    {
    	return $this->belongsToMany('App\Tshirt')
	                ->withPivot('price', 'quantity');
    }
}
