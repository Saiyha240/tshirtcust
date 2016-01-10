@extends('tshirt.master')

@section('content')
    @include('tshirt.partials.controls')
    @include('tshirt.partials.editor')
    <div class="col-md-2">
        <!-- TO DO for submission of form -->
        {!! Form::open(['route' => ['tshirts.update', $tshirt->id], 'method' => 'put']) !!}
            {!! Form::text('name', $tshirt->name, ['class' => 'form-control']) !!}
            {!! Form::hidden('canvas_data', $tshirt->canvas_data, ['id' => 'canvas_data']) !!}
            {!! Form::hidden('canvas_image', null, ['id' => 'canvas_image']) !!}
            {!! Form::submit('Save',
                    [
                        'id'        => 'save-tshirt',
                        'class'     => 'btn btn-primary',
                        'title'     => 'Proceed to payment'
                    ]
                )
            !!}
        {!! Form::close() !!}


    </div>
@endsection