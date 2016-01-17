@extends('tshirt.master')

@section('content')
    @include('tshirt.partials.controls')
    @include('tshirt.partials.editor')

    <div class="col-md-2">
        <!-- TO DO for submission of form -->
        {!! Form::open(['route' => 'tshirts.store']) !!}
            @include('tshirt.forms.tshirtForm')
        {!! Form::close() !!}
    </div>
@endsection
