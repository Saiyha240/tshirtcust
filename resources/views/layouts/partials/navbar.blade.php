<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container">
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
            <a href="{{ URL::route('tshirt.create') }}">Create</a>
          </li>
          <li>
            <a href="{{ URL::route('tshirt.index') }}">List</a>
          </li>
          <!-- If admin -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administration <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../admin/dashboard">Dashboard</a></li>
              <li><a href="../admin/orders">Orders</a></li>
              <li><a href="../admin/reports">Reports</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../admin/users">Users</a></li>
              <li><a href="../admin/shirts">Shirts</a></li>
              <li><a href="../admin/layouts">Shirt Layouts</a></li>
              <li><a href="../admin/images">Images</a></li>
            </ul>
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
  </div>
</nav>


@include('auth.loginModal')
