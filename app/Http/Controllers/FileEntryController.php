<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Http\Requests\FileEntryRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FileEntryController extends Controller {
	use FileHandlerTrait;

	public function index() {
		$entries = FileEntry::all();

		return view( 'admin.images', compact( 'entries' ) );
	}

	public function store( FileEntryRequest $request ) {
		$file = $request->file( 'frontFile' );
		$this->saveImage( $file );

		return redirect()->action( 'TshirtController@index' );

	}

	public function usableImages(){
		$images = Auth::user()->fileentries()->usableImages()->get();

		return view();
	}

}
