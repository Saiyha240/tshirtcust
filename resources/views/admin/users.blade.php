@extends('admin.admin')

@section('content')
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
            <!-- Sample data -->
            <tr>
              <td>1</td>
              <td><a>Sample User</a></td>
              <td>user@tshirt.com</td>
              <td>09199999999</td>
              <td>Male</td>
              <td><button class="btn btn-primary">Block</button></td>
            </tr>
        </tbody>
    </table>

@endsection
