@extends('layouts.master')

@section('content')
    <div class="container form-container">
        <div class="row">
            <div class="center-block">
                @include('auth.forms.loginForm')
            </div>
        </div>
    </div>
@endsection
