@extends('layouts.baselayout')

@section('content')
<div class="container form-container">
    <div class="row">
        <div class="center-block">

					<form action="/register" method="POST" class="form-horizontal">
					<fieldset>
					<!-- Form Name -->
					<legend>Create an account</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="textinput">Username</label>
						<div class="col-md-4">
						<input id="textinput" name="textinput" type="text" placeholder="Username" class="form-control input-md" required="">
						<span class="help-block">Enter Username</span>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="email">Email Address</label>
						<div class="col-md-4">
						<input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
						<span class="help-block">Enter Email Address</span>
						</div>
					</div>

					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="passwordinput">Password</label>
						<div class="col-md-4">
							<input id="passwordinput" name="passwordinput" type="password" placeholder="Create Password" class="form-control input-md" required="">
							<span class="help-block">Must be greater than 6 characters.</span>
						</div>
					</div>

					<!-- Password input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="passwordconfirm">Confirm Password</label>
						<div class="col-md-4">
							<input id="passwordconfirm" name="passwordconfirm" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
							<span class="help-block">Enter password again</span>
						</div>
					</div>

					<!-- Select Basic -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="gender">Select Gender</label>
						<div class="col-md-4">
							<select id="gender" name="gender" class="form-control">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="register"></label>
						<div class="col-md-4">
							<button id="register" name="register" class="btn btn-lg btn-primary">Register Now</button>
						</div>
					</div>

					</fieldset>
					</form>
				</div>
		</div>
</div>

@endsection
