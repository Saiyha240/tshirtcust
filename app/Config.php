<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
	protected $fillable = ['key', 'value', 'display_name'];

	public $timestamps = false;
}
