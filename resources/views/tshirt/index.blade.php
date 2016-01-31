@extends('tshirt.master')

@section('content')
  <div class="container-md">
    @include('layouts.partials.flash_message')
    <table class="table table-striped tablewidth-md">
        <thead>
            <tr>
                <th>#</th>
                <th class="td-thumbnail">Front</th>
                <th class="td-thumbnail">Back</th>
                <th>Name</th>
                <th>Edit</th>
                @if( !Auth::user()->isAdmin() )
                  <th>Add to cart</th>
                @endif
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $tshirts as $tshirt )
                <tr>
                    <td>{{ $tshirt->id }}</td>
                    <td class="td-thumbnail" >
                      <img src="{{ $tshirt->front_canvas_image }}" alt="..." class="img-responsive img-thumbnail">
                    </td>
                    <td class="td-thumbnail">
                       <?php if(($tshirt->back_canvas_image) == "plain") : ?>
                         <img src="../img/plain.png" alt="..." class="img-responsive img-thumbnail">
                       <?php else : ?>
                        <img src="{{ $tshirt->back_canvas_image }}" alt="..." class="img-responsive img-thumbnail">
                       <?php endif; ?>
                    </td>
                    <td>
                        {!! HTML::linkRoute('tshirts.show', $tshirt->name, ['id' => $tshirt->id]) !!}
                    </td>
                    <td>
                        <a href="{{ URL::route('tshirts.edit', ['id' => $tshirt->id]) }}"><button class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</button></a>
                    </td>
                    @if( !Auth::user()->isAdmin() )
                      <td>
                          {!! Form::open(['route' => ['cart.addItem', $tshirt->id], 'class' => 'form-inline']) !!}
                              {!! Form::button('<i class="fa fa-cart-plus"></i> Add to Cart', ['class'=>'btn btn-success', 'type'=>'submit']) !!}
                          {!! Form::close() !!}
                      </td>
                    @endif
                    <td>
                        {!! Form::open(['route' => ['tshirts.destroy', $tshirt->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
