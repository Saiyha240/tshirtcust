<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Order;
use App\User;
use App\Http\Requests\FileEntryRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller {
	use FileHandlerTrait;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	public function reports() {
		$orders = Order::where( 'status', 2 )->get();

		return view( 'admin.reports', compact( 'orders' ) );
	}

	public function users() {
		return view( 'admin.users' )
			->with( 'users', User::users()->get() );
	}

	public function config() {
		return view( 'admin.config' );
	}

	public function layouts() {
		return view( 'admin.layouts' );
	}

	public function images() {
		$entries = FileEntry::all();

		return view( 'admin.images', compact( 'entries' ) );
	}

	public function orders() {
		$orders = Order::whereIn( 'status', [0,1] )->get();

		return view( 'admin.orders', compact( 'orders' ) );
	}

	public function imageStore( FileEntryRequest $request ) {

		$file = $request->file( 'frontFile' );
		$this->saveImage( $file );

		return redirect()->action( 'AdminController@images' );

	}
}
