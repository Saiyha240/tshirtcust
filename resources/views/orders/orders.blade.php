@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row container-md">
      <h3>My Orders</h3>
      <table class="table table-striped tablewidth-md">
          <thead>
              <tr>
                  <th>Order #</th>
                  <th>Total Quantity</th>
                  <th>Total Price</th>
                  <th>Ordered on</th>
                  <th>View</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <!-- Sample data -->
              <tr>
                <td>1</td>
                <td>23</td>
                <td>Php 900</td>
                <td>01-01-2016</td>
                <td><a><button class="btn btn-primary">View Items</button></a></td>
                <td><span class="label label-primary">Ongoing</span></td>
              </tr>
              <!-- Order details to follow -->
          </tbody>
      </table>
    </div>
</div><!-- /container -->
@endsection
