@extends('layouts.master')

@section('content')
    <div class="container container-fluid center-block">
        <div class="row">
            <div class="col-md-8">
          {{--  @foreach( $items as $item ) --}}
                    <div class="item">
                        <div class="item-details">
                            <img src="{{--$item->tshirt->front_canvas_image--}}" alt="{{--$item->tshirt->name--}}"
                                 class="img-responsive img-thumbnail">
                            <div class="details">
                                <span class="title">{{--$item->tshirt->name--}}</span><br>
                                <span  id="quantity">{{--$item->quantity--}}</span><br>
                            </div>
                            <div class="pricing">
                                <span class="gross">Php <span id="gross">{{--$price--}}</span></span>
                            </div>
                        </div>
                    </div>
            {{--    @endforeach --}}
              </div>

            <div class="col-md-4 checkout">
                <div class="checkout-data">
                    <b>Total: </b><span class="text-primary">Php <span id="total">{{--$total--}}</span></span>
                </div>
            </div>
        </div>
    </div>
@endsection
