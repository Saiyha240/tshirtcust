@extends('layouts.admin')

@section('content')
    <h1>Configuration</h1>
    <hr>
    <div class="container-md">
    	<div class="col-md-6 col-md-offset-3">
          @include('layouts.partials.flash_message')
            <h3>Current Price:Php  <span class="text-primary">{{$config->value}}</span> / shirt</h3>
            {!! Form::open(['route' => 'config.update']) !!}
              <div class="form-group">
                  <label for="price">Update Shirt Price</label>
                  <input type="text" class="form-control" name="price" required/>
              </div>
              <input type="submit" class="btn btn-primary btn-sm" value="Update" name="submit">
            {!! Form::close() !!}
      </div>
  	</div>
@endsection
