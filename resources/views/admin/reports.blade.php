@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-sm bg-primary">
        <span class="glyphicon glyphicon-usd"></span>
        <div class="card-content">
            <div class="card-number">Php 2300</div>
            <div class="card-text">Sales</div>
        </div>
      </div>
    </div>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Ordered by</td>
                <td>Ordered on</td>
                <td>Status</td>
                <td>View Items</td>
            </tr>
        </thead>
        <tbody>
            @foreach( $orders as $order )
            <tr>
              <td>{{$order->id}}</td>
              <td>{{ $order->totalQuantity() }}</td>
              <td>Php {{ $order->totalPrice() }}</td>
              <td>User {{ $order->user_id }}</td>
              <td>{{ $order->created_at }}</td>
              <td><span class="label label-success">Completed</span></td>
              <td>
                  <a href="{{ URL::action('OrderController@show', $order->id) }}">
                      <button class="btn btn-primary btn-xs">View Items</button>
                  </a>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
