@extends('layouts.master')

@section('content')
<div class="container container-fluid center-block" id="payment">
  <div class="row" style="display:none" id="emptycart">
      <p class="bg-warning center-block" align="center">There are no items on your cart. Add items to pay.</p>
  </div>
  <div class="row">

    <div class="col-md-8" >
      <div id="items">
        <input type="hidden" value="{{count($items)}}" id="itemsNumber"></input>
        @foreach($items as $item)
        <div class="item">
          <div class="item-details">
            <input type="hidden" value="{{$item->tshirt->id}}" id="tshirtid"></input>
            <input type="hidden" value="{{$item->tshirt->price}}" id="price"></input>
            <img src="{{$item->tshirt->front_canvas_image}}" alt="{{$item->tshirt->name}}" class="img-responsive img-thumbnail">
            <div class="details">
              <span class="title">{{$item->tshirt->name}}</span><br>
              <input type="text" class="form-control" id="quantity" placeholder="Items" value="1"></input>
            </div>
            <div class="pricing">
              <span class="gross">Php <span id="gross">{{$item->tshirt->price}}</span></span>
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
        <input type="hidden" value="{{$total}}" id="totalInitial"></input>
        <b>Total: </b><span class="text-primary">Php <span id="total">{{$total}}</span></span>
      </div>
      <div class="checkout-button">
        <button class="btn btn-lg btn-primary btn-block" id="checkout">Checkout</button>
      </div>
    </div>

  </div>
</div>
@endsection
