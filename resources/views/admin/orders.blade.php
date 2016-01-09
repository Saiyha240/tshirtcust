@extends('admin.admin')

@section('content')
    <h1>Orders</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Quantity</td>
                <td>Ordered by</td>
                <td>Ordered on</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <!-- Sample data -->
            <tr>
              <td>1</td>
              <td><a>Sample Shirt</a></td>
              <td>23</td>
              <td>Sample User</td>
              <td>01-01-2016</td>
              <td>Pending</td>
              <td><button class="btn btn-primary">Mark as done</button></td>
            </tr>
        </tbody>
    </table>

@endsection
