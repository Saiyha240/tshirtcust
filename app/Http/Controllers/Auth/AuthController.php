<?php

namespace App\Http\Controllers\Auth;

use App\Cart;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $redirectTo = '/tshirts';
	protected $username = 'username';

	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'username' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
			'gender' => 'required|in:M,F'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		$user = User::create([
			'username' => $data['username'],
			'email' => $data['email'],
			'gender' => $data['gender'],
			'password' => bcrypt($data['password']),
		]);

		$cart = new Cart();
		$cart->user()->associate($user);
		$cart->save();

		return $user;
	}

	public function redirectPath()
	{
		// Logic that determines where to send the user
		if ( Auth::user()->isAdmin() ) {
			return '/admin/dashboard';
		}

		return '/tshirts';
	}
}
