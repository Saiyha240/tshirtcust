@extends('tshirt.master')

@section('content')
<div class="container-fluid">
    <h3>Design Viewer</h3>
    <hr>
    <div class="row viewer">
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-6">
              <img src="{{$tshirt->front_canvas_image}}"/>
            </div>
            <div class="col-md-6">
              <?php if(($tshirt->back_canvas_image) == "plain") : ?>
                <img src="../../img/plain.png">
              <?php else : ?>
               <img src="{{ $tshirt->back_canvas_image }}">
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <h3>{{$tshirt->name}}</h3>
          <br>
          @if( !Auth::user()->isAdmin() )
            <div>
              {!! Form::open(['route' => ['cart.addItem', $tshirt->id], 'class' => 'form-inline']) !!}
                  {!! Form::button('<i class="fa fa-cart-plus"></i> Add to Cart', ['class'=>'btn btn-success btn-block', 'type'=>'submit']) !!}
              {!! Form::close() !!}
            </div>
          @endif
        </div>
    </div>
</div>
@endsection
