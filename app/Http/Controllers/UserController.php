<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

	public function index() {
		//
	}

	public function create() {
		//
	}

	public function store( Request $request ) {
		//
	}

	public function show( $id ) {
		//
	}

	public function edit( $id ) {
		//
		$user = User::find( $id );

		return view( 'user.edit' )
			->with( 'user', $user );
	}

	public function update( Request $request, $id ) {
		//
		$user = User::find( $id );

		$user->update( $request->all() );

		return Redirect::action( 'AdminController@users' )
		               ->with( 'f_message', 'Successfully updated user ' . $user->username )
		               ->with( 'f_type', 'alert-success' );
	}

	public function destroy( $id ) {
		//
		$user = User::find( $id );

		if ( User::destroy( $id ) > 0 ) {
			return Redirect::action( "AdminController@users" )
			               ->with( 'f_message', 'Successfully deleted user ' . $user->username )
			               ->with( 'f_type', 'alert-success' );
		}
	}
}
