@if( Session::has('f_message') )
    <div class="alert {{ Session::get('f_type')}}">
        {{ Session::get('f_message') }}
    </div>
@endif