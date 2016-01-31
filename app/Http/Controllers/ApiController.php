<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller {
	//
	public function __construct() {
		$this->user = Auth::user();
	}

	public function getUsableImages() {
		return response()->json( FileEntry::usableImages( $this->user->id )->get() );
	}
}
