<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    //
	public function getUsableImages(){
		return response()->json( Auth::user()->fileentries()->usableImages()->get() );
	}
}
