<?php

namespace App\Http\Controllers;

use App\FileEntry;
use App\Order;
use App\User;
use App\Http\Requests\FileEntryRequest;

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

    public function reports()
    {
        $orders = Order::where('status', 1)->get();

        return view('admin.reports', compact('orders'));
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

    public function images()
    {
  	    $entries = FileEntry::all();

  	    return view('admin.images', compact('entries'));
    }

    public function orders()
    {
        $orders = Order::where('status', 0)->get();

        return view('admin.orders', compact('orders'));
    }

	public function imageStore(FileEntryRequest $request)
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
