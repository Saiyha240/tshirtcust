<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait FileHandlerTrait {

	public function saveImage( $file, $fileName = "" ) {
		$extension = $file->getClientOriginalExtension();

		Storage::disk( 'local' )->put( $file->getFilename() . '.' . $extension, File::get( $file ) );

		$entry = FileEntry::create( [
			'mime'              => $file->getClientMimeType(),
			'original_filename' => $file->getClientOriginalName(),
			'filename'          => $file->getFilename() . '.' . $extension,
			'custom_name'       => $fileName,
			'user_id'           => Auth::user()->id
		] );

		return $entry->save();
	}


}
