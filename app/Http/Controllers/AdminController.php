<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function users()
    {
        return view('admin.users')
	            ->with('users', User::users()->get());
    }

    public function config()
    {
        return view('admin.config');
    }

    public function layouts()
    {
        return view('admin.layouts');
    }

    public function images()
    {
	    $entries = FileEntry::all();

	    return view('admin.images', compact('entries'));
    }

	public function store(Request $request)
	{
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
}
