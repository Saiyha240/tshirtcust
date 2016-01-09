@extends('layouts.master')

@section('content')
<div class="container container-fluid center-block" id="payment">
  <div class="row" style="display:none" id="emptycart">
      <p class="bg-warning center-block" align="center">There are no items on your cart. Add items to pay.</p>
  </div>
  <div class="row">

    <div class="col-md-8" >
      <div id="items">
        <!-- sample hardcoded item -->
        <div class="item" id="item">
          <div class="item-details">
            <input type="hidden" value="1" name="price"></input>
            <img src="..." alt="..." class="img-responsive img-thumbnail">
            <div class="details">
              <span class="title">Label Sample</span><br>
              <input type="text" class="form-control" id="quantity" placeholder="Items" value="1"></input>
            </div>
            <div class="pricing">
              <span class="gross" id="gross">$ 9999</span>
              <button type="button" class="btn btn-default remove-button">
                <span class="glyphicon glyphicon glyphicon-remove"></span>
              </button>
            </div>
          </div>
        </div>
        <!-- sample hardcoded item -->
        <div class="item" id="item">
          <div class="item-details">
            <input type="hidden" value="99" name="price"></input>
            <img src="..." alt="..." class="img-responsive img-thumbnail">
            <div class="details">
              <span class="title">Label Sample</span><br>
              <input type="text" class="form-control" id="quantity" placeholder="Items" value="1"></input>
            </div>
            <div class="pricing">
              <span class="gross" id="gross">$ 99</span>
              <button type="button" class="btn btn-default remove-button">
                <span class="glyphicon glyphicon glyphicon-remove"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4 checkout">
      <div class="checkout-data">
        <b>Total: </b><span class="text-primary" id="total">999999</span>
      </div>
      <div class="checkout-button">
        <button class="btn btn-lg btn-primary btn-block" id="checkout">Checkout</button>
      </div>
    </div>

  </div>
</div>
@endsection
