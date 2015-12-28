{!! Form::open( array( 'route' => 'postLogin', 'class' => '', 'id' => 'loginForm' ) ) !!}
    <div class="form-group">
        {!! Form::label('Username', null, array('for' => 'username', 'class' => 'control-label')) !!}
        {!! Form::text('username', null,
                 array(
                    'required',
                    'id' => 'username',
                    'class' => 'form-control',
                    'placeholder' => 'Username'
                )
            )
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('Password', null, array('for' => 'password', 'class' => 'control-label')) !!}
        {!! Form::password('password',
                 array(
                    'required',
                    'id' => 'password',
                    'class' => 'form-control',
                    'placeholder' => 'Password'
                )
            )
        !!}
    </div>
    <div class="form-group">
        {!! Form::label('', null, array('for' => 'registerBtn', 'class' => 'control-label')) !!}
        {!! Form::submit('Login',
                 array(
                    'required',
                    'id' => 'registerBtn',
                    'class' => 'btn btn-primary'
                )
            )
        !!}
    </div>
{!! Form::close() !!}