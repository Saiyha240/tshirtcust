<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tshirt extends Model
{
    use SoftDeletes;

    protected $casts = [
        'paid' => 'boolean',
        'payment_data' => 'object'
    ];

    protected $dates = [ 'deleted_at' ];

    protected $fillable = ['name', 'canvas_data', 'canvas_image'];
    
    public function users()
    {
    	return $this->belongsTo('User');
    }

}
