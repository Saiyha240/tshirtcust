@extends('layouts.master')

@section('content')
    <div class="container form-container">
        <div class="row">
            {!! Form::model( $user, ['action' => ['UserController@update', $user->id], 'method' => 'patch', 'class' => 'form-horizontal' ] ) !!}
				@include('auth.forms.userDataForm', ['submitText' => 'Update profile'])
			{!! Form::close() !!}
        </div>
    </div>
@endsection