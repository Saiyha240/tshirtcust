<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tshirt extends Model
{
    use SoftDeletes;

    protected $casts = [
        'paid' => 'boolean'
    ];

    protected $dates = [ 'deleted_at' ];

    protected $fillable = ['user_id', 'name', 'canvas_data', 'canvas_image'];
    
    public function users()
    {
    	return $this->belongsTo('User');
    }

}
