{!! Form::text('name', null, ['class' => 'form-control']) !!}
{!! Form::hidden('front_canvas_data', null, ['id' => 'front_canvas_data']) !!}
{!! Form::hidden('front_canvas_image', null, ['id' => 'front_canvas_image']) !!}
{!! Form::hidden('back_canvas_data', null, ['id' => 'back_canvas_data']) !!}
{!! Form::hidden('back_canvas_image', null, ['id' => 'back_canvas_image']) !!}
{!! Form::submit('Save',
        [
            'id'        => 'save-tshirt',
            'class'     => 'btn btn-primary',
            'title'     => 'Proceed to payment'
        ]
    )
!!}