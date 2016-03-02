@extends('layouts.master')

@section('content')
    <div class="container container-fluid center-block">
        <div class="row container-md">
            <div class="col-md-8">
                @foreach( $tshirts as $tshirt )
                    <div class="item">
                        <div class="item-details">
                            <img src="{{$tshirt->front_canvas_image}}" alt="{{$tshirt->name}}"
                                 class="img-responsive img-thumbnail">

                            <div class="details">
                                <span class="title"><a href="/tshirts/{{$tshirt->id}}">{{$tshirt->name}}</a></span><br>
                                <span id="quantity">{{$tshirt->pivot->quantity}}</span><br>
                            </div>
                            <div class="pricing">
                                <span class="gross">Php <span id="gross">{{$tshirt->pivot->price}}</span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4 checkout">
                <div class="checkout-data">
                    <b>Total: </b><span class="text-primary">Php <span id="total">{{$total}}</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection
