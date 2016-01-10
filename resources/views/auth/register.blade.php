@extends('layouts.master')

@section('content')
    <div class="container form-container">
        <div class="row">
            {!! Form::open( array( 'route' => 'postRegister', 'class' => 'form-horizontal' ) ) !!}
				@include('auth.forms.userDataForm', ['submitText' => 'Register Now'])
			{!! Form::close() !!}
        </div>
    </div>
@endsection
