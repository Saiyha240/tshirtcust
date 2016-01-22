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
                @foreach( $orders as $order )
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->totalQuantity() }}</td>
                        <td>Php {{ $order->totalPrice() }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ URL::action('OrderController@show', $order->id) }}">
                                <button class="btn btn-primary btn-xs">View Items</button>
                            </a>
                        </td>
                        <td><span class="label label-primary">Verified</span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- /container -->
@endsection
