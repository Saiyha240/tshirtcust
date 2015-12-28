<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tshirt extends Model
{
    //
    public function users()
    {
    	return $this->belongsTo('User');
    }
}
