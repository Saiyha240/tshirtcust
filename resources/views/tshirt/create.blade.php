@extends('tshirt.master')

@section('content')
    @include('tshirt.partials.controls')
    @include('tshirt.partials.editor')

    <div class="col-md-2">
        <!-- TO DO for submission of form -->
        {!! Form::open(['route' => 'tshirt.store']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
            </div>
            {!! Form::hidden('canvas_data', null, ['id' => 'canvas_data']) !!}
            {!! Form::hidden('canvas_image', null, ['id' => 'canvas_image']) !!}
            {!! Form::submit('Create',
                    [
                        'id'        => 'save-tshirt',
                        'class'     => 'btn btn-primary',
                        'title'     => 'Create Tshirt'
                    ]
                )
            !!}
        {!! Form::close() !!}
    </div>
@endsection

