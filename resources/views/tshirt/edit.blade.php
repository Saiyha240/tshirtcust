@extends('tshirt.master')

@section('content')
    @include('tshirt.partials.controls')
    @include('tshirt.partials.editor')
    <div class="col-md-2">
        <!-- TO DO for submission of form -->
        {!! Form::model( $tshirt, ['route' => ['tshirts.update', $tshirt->id], 'method' => 'put'] ) !!}
            @include('tshirt.forms.tshirtForm')
        {!! Form::close() !!}


    </div>
@endsection