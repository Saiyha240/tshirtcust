@extends('layouts.master')

@section('content')
    <div class="container container-fluid center-block" id="payment">
        <div class="row" style="display:none" id="emptycart">
            <p class="bg-warning center-block" align="center">There are no items on your cart. Add items to pay.</p>
        </div>
        <div class="row">
            {!! Form::open(['action' => 'CartController@pay']) !!}
            <div class="col-md-8">
                <div id="items">
                    <input type="hidden" value="{{count($items)}}" id="itemsNumber"/>
                    @foreach( $items as $item )
                        <div class="item">
                            <div class="item-details">
                                {!! Form::hidden('tshirt_id[]', $item->tshirt->id ,['id' => 'tshirt_id']) !!}
                                {!! Form::hidden('tshirt_price[]', $price,['id' => 'tshirt_price']) !!}
                                <img src="{{$item->tshirt->front_canvas_image}}" alt="{{$item->tshirt->name}}"
                                     class="img-responsive img-thumbnail">

                                <div class="details">
                                    <span class="title">{{$item->tshirt->name}}</span><br>
                                    {!! Form::input('number', 'tshirt_quantity[]', $item->quantity,['class' => 'form-control', 'id' => 'quantity', 'min' => '1']) !!}
                                    <meta name="_token" content="{!! csrf_token() !!}"/>
                                </div>
                                <div class="pricing">
                                    <span class="gross">Php <span id="gross">{{$price}}</span></span>
                                    <a href="cart/removeItem/{{$item->id}}">
                                        <button type="button" class="btn btn-default remove-button">
                                            <span class="glyphicon glyphicon glyphicon-remove"></span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-4 checkout">
                <div class="checkout-data">
                    <input type="hidden" value="{{$total}}" id="totalInitial"/>
                    <b>Total: </b><span class="text-primary">Php <span id="total">{{$total}}</span></span>
                </div>
                <div class="checkout-button">
                    {!! Form::submit('Checkout', ['class'=>'btn btn-lg btn-primary btn-block', 'id' => 'checkout']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
