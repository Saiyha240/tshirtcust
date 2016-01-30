@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-sm bg-primary">
        <span class="glyphicon glyphicon-tag"></span>
        <div class="card-content">
            <div class="card-number">23</div>
            <div class="card-text">Current Price</div>
        </div>
      </div>
    </div>
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
