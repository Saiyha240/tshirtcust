<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Http\Requests\FileEntryRequest;

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

	public function store( FileEntryRequest $request ) {
		$file        = $request->file( 'frontFile' );
		$custom_name = $request->get( 'custom_name' );
		$this->saveImage( $file, $custom_name );

		return redirect()->action( 'TshirtController@index' );

	}

	public function destroy( $id ) {

	}
}
