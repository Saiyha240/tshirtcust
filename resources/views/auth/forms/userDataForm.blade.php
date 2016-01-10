 <div class="form-group">
    {!! Form::label('Username', null, array('for' => 'username', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::text('username', null,
                 array(
                    'required',
                    'id' => 'username',
                    'class' => 'form-control input-md',
                    'placeholder' => 'Username'
                )
            )
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Email', null, array('for' => 'email', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::email('email', null,
                 array(
                    'required',
                    'id' => 'email',
                    'class' => 'form-control input-md',
                    'placeholder' => 'Email'
                )
            )
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Password', null, array('for' => 'password', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::password('password',
                 array(
                    'required',
                    'id' => 'password',
                    'class' => 'form-control input-md',
                    'placeholder' => 'Password'
                )
            )
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Confirm Password', null, array('for' => 'password_confirmation', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::password('password_confirmation',
                 array(
                    'required',
                    'id' => 'password_confirmation',
                    'class' => 'form-control input-md',
                    'placeholder' => 'Confirm Password'
                )
            )
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Gender', null, array('for' => 'gender', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::select('gender',
                 [
                    "" => "--",
                    "M" => "Male",
                    "F" => "Female"
                 ],
                 null,
                 array(
                     'required',
                    'id' => 'gender',
                    'class' => 'form-control input-md'
                 )
            )
        !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('', null, array('for' => 'registerBtn', 'class' => 'col-md-4 control-label')) !!}
    <div class="col-md-4">
        {!! Form::submit($submitText,
                 array(
                    'required',
                    'id' => 'registerBtn',
                    'class' => 'btn btn-primary'
                )
            )
        !!}
    </div>
</div>