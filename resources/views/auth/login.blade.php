@extends('layouts.master')

@section('content')
    <div class="container form-container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-danger centered-text" role="alert">
              <strong>Username or password is incorrect.</strong>
              Please try again.
            </div>
          </div>
            <div class="col-md-4 col-md-offset-4">
                @include('auth.forms.loginForm')
            </div>
        </div>
    </div>
@endsection
