<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FileEntry extends Model {
	protected $table = 'fileentries';
	protected $dates = [ 'deleted_at' ];
	protected $fillable = [ 'filename', 'mime', 'original_filename', 'custom_name', 'user_id' ];

	public function user() {
		return $this->belongsTo( 'user' );
	}

	public function scopeUsableImages( $query ) {
		return $query->whereIn( 'user_id', [ 1, Auth::user()->id ] );
	}
}
