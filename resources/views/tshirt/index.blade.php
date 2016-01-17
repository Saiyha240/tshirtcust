@extends('tshirt.master')

@section('content')
    @include('layouts.partials.flash_message');
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td class="td-thumbnail">Front</td>
                <td class="td-thumbnail">Back</td>
                <td>Name</td>
                <td>Add to cart</td>
                <td>Status</td>
                <td>Remove</td>
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
                        {!! HTML::linkRoute('tshirts.edit', $tshirt->name, ['id' => $tshirt->id]) !!}
                    </td>
                    <td>
                        {!! Form::open(['route' => ['cart.addItem', $tshirt->id], 'class' => 'form-inline']) !!}
                            {!! Form::button('<i class="fa fa-cart-plus"></i> Add to Cart', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                    <td>
                        <!-- Insert status data here -->
                    </td>
                    <td>
                        {!! Form::open(['route' => ['tshirts.destroy', $tshirt->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
