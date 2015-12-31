<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tshirt-navbar-collapse">
       <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
       <span class="icon-bar"></span><span class="icon-bar"></span>
    </button> <a class="navbar-brand" href="/">Brand</a>
  </div>

  <div class="collapse navbar-collapse" id="tshirt-navbar-collapse">
    <ul class="nav navbar-nav">
      @if( !Auth::guest() )
        <li class="">
          <a href="{{ URL::route('getTshirtCreate') }}">Create</a>
        </li>
        <li>
          <a href="{{ URL::route('getTshirtEdit') }}">Temporary Edit Link</a>
        </li>
      @endif
    </ul>

    <ul class="nav navbar-nav navbar-right">
    @if( Auth::guest() )
      <li><a href="{{ URL::route('getRegister') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#" id="loginButton" data-selector="#login-dialog" class="dialog-link"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    @else
      <li><a href="{{ URL::route('getLogout') }}"><span class="glyphicon glyphicon-user"></span> Logout {{ $user->username }}</a></li>
    @endif
    </ul>
  </div>
</nav>

@include('auth.loginModal')
