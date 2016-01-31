<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

trait FileHandlerTrait {

	public function saveImage( $file) {
		$extension = $file->getClientOriginalExtension();
		$filename  = md5( env( 'APP_KEY' ) . rand( 0, 100 ) . time() );
		$path      = public_path( 'img\\uploads\\' ) . $filename . '.' . $extension;

		Image::make( $file )->save($path);

		$entry = FileEntry::create( [
			'mime'              => $file->getClientMimeType(),
			'original_filename' => $file->getClientOriginalName(),
			'filename'          => $filename . '.' . $extension,
			'user_id'           => Auth::user()->id
		] );

		return $entry->save();
	}

}
