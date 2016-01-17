<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tshirt extends Model
{
    use SoftDeletes;

    protected $casts = [
        'paid'          => 'boolean',
        'verified'      => 'boolean',
        'payment_data'  => 'object'
    ];

    protected $dates = [ 'deleted_at' ];

    protected $fillable = ['name', 'front_canvas_data', 'front_canvas_image', 'back_canvas_data', 'back_canvas_image'];
    
    public function users()
    {
    	return $this->belongsTo('User');
    }

}
