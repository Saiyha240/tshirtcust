<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileEntry extends Model
{
	protected $table = 'fileentries';
	protected $dates = [ 'deleted_at' ];
    protected $fillable = ['filename', 'mime', 'original_filename'];
}
