<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tshirt extends Model
{
    use SoftDeletes;

    protected $dates = [ 'deleted_at' ];

    protected $fillable = ['name', 'front_canvas_data', 'front_canvas_image', 'back_canvas_data', 'back_canvas_image'];
    
    public function users()
    {
    	return $this->belongsTo('User');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

}
