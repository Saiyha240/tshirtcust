<?php

namespace App\Http\Controllers;

use App\FileEntry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileEntryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$entries = FileEntry::all();

		return view( 'admin.images', compact( 'entries' ) );
	}

	public function store(Request $request) {
		$file = $request->file('frontFile');

		$extension = $file->getClientOriginalExtension();

		if( strcmp( strtolower($extension), 'png' ) == 0 )
		{
			Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));

			$entry = FileEntry::create([
				'mime'                  => $file->getClientMimeType(),
				'original_filename'     => $file->getClientOriginalName(),
				'filename'              => $file->getFilename().'.'.$extension
			]);

			$entry->save();

			return Redirect::route('admin.images');
		}else{
			return Redirect::route('admin.images');
		}

	}

	public function destroy( $id ) {

	}
}
