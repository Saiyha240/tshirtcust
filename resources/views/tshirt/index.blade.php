@extends('tshirt.master')

@section('content')
    @if( Session::has('f_message') )
        <div class="alert {{ Session::get('f_type')}}">
            {{ Session::get('f_message') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Paid</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tbody>
            @foreach( $tshirts as $tshirt )
                <tr>
                    <td>{{ $tshirt->id }}</td>
                    <td>
                        {!! HTML::linkRoute('tshirt.edit', $tshirt->name, ['id' => $tshirt->id]) !!}
                    </td>
                    <td>
                        @if( !$tshirt->paid )
                            {!! Form::open(['route' => ['tshirt.pay', $tshirt->id], 'class' => 'form-inline']) !!}
                                {!! Form::submit('Pay', ['class'=>'btn btn-danger ']) !!}
                            {!! Form::close() !!}
                        @else
                            <h4><span class="label label-success">Paid</span></h4>
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['route' => ['tshirt.destroy', $tshirt->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection