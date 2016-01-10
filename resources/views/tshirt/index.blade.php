@extends('tshirt.master')

@section('content')
    @include('layouts.partials.flash_message');
    <table class="table table-striped">
        <thead>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Paid</td>
                <td>Status</td>
                <td>Remove</td>
            </tr>
        </thead>
        <tbody>
            @foreach( $tshirts as $tshirt )
                <tr>
                    <td>{{ $tshirt->id }}</td>
                    <td>
                        {!! HTML::linkRoute('tshirts.edit', $tshirt->name, ['id' => $tshirt->id]) !!}
                    </td>
                    <td>
                        @if( !$tshirt->paid )
                            {!! Form::open(['route' => ['tshirts.pay', $tshirt->id], 'class' => 'form-inline']) !!}
                                {!! Form::submit('Pay', ['class'=>'btn btn-danger ']) !!}
                            {!! Form::close() !!}
                        @else
                            <h4><span class="label label-success">Paid</span></h4>
                        @endif
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
