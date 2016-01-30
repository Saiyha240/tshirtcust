@extends('layouts.admin')

@section('content')
  <div class="card">
    <div class="card-sm bg-primary">
      <span class="glyphicon glyphicon-user"></span>
      <div class="card-content">
          <div class="card-number">23</div>
          <div class="card-text">Users</div>
      </div>
    </div>
  </div>
  <hr>
  @include('layouts.partials.flash_message');
  <table class="table table-striped">
      <thead>
          <tr>
              <td>#</td>
              <td>Name</td>
              <td>Email</td>
              <td>Phone Number</td>
              <td>Gender</td>
              <td>Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach( $users as $user )
              <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->contact_number }} </td>
                  <td>{{ $user->gender }}</td>
                  <td>
                      {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'delete']) !!}
                          {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
      </tbody>
  </table>
@endsection
