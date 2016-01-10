@extends('layouts.admin')

@section('content')
  @include('layouts.partials.flash_message');
  <h1>Users</h1>
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

                      <a href="{{ URL::action('UserController@edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                      {!! Form::open(['action' => ['UserController@destroy', $user->id], 'method' => 'delete']) !!}
                          {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                      {!! Form::close() !!}
                  </td>
              </tr>
            @endforeach
      </tbody>
  </table>
@endsection
