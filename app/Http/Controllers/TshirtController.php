<?php

namespace App\Http\Controllers;

use App\Tshirt;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;

class TshirtController extends Controller
{

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tshirt.index')->with(
            'tshirts', $this->user->tshirts()->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tshirt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tshirt = $request->user()->tshirts()->create($request->all());
        $tshirt->save();

        return Redirect::route('tshirt.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $tshirt = Tshirt::findOrFail($id);

            return view('tshirt.edit')->with('tshirt', $tshirt);

        } catch (ModelNotFoundException $e)
        {
            return abort(404);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $tshirt = Tshirt::findOrFail( $id );

            $tshirt->name = $request->get('name');
            $tshirt->canvas_data = $request->get('canvas_data');
            $tshirt->canvas_image = $request->get('canvas_image');

            $tshirt->save();

            return Redirect::action( "TshirtController@index" )
                           ->with('f_message', 'Successfully updated tshirt ' . $tshirt->name)
                           ->with('f_type', 'alert-success');

        }catch (Exception $e){
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tshirtName = Tshirt::find($id)->name;

        if( Tshirt::destroy($id) > 0 )
        {
            return Redirect::action( "TshirtController@index" )
                           ->with('f_message', 'Successfully deleted tshirt ' . $tshirtName)
                           ->with('f_type', 'alert-success');
        }

    }

    public function pay($id)
    {
        $tshirt = Tshirt::find($id);

        $tshirt->paid = true;

        $tshirt->save();

        return Redirect::route('tshirt.index');
    }
}
