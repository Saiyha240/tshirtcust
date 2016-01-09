@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 ">
			<div class="row">
				<div class="col-md-6 card">
          <div class="card-sm bg-primary">
            <span class="glyphicon glyphicon-inbox"></span>
            <div class="card-content">
                <div class="card-number">23</div>
                <div class="card-text">Pending orders</div>
            </div>
          </div>
				</div>
				<div class="col-md-6 card">
          <div class="card-sm bg-success">
            <span class="glyphicon glyphicon-ok"></span>
            <div class="card-content">
                <div class="card-number">23</div>
                <div class="card-text">Pending orders</div>
            </div>
          </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 card-lg">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6 card">
          <div class="card-sm bg-info">
            <span class="glyphicon glyphicon-usd"></span>
            <div class="card-content">
                <div class="card-number">23</div>
                <div class="card-text">Pending orders</div>
            </div>
          </div>
				</div>
				<div class="col-md-6 card">
          <div class="card-sm bg-warning">
            <span class="glyphicon glyphicon-user"></span>
            <div class="card-content">
                <div class="card-number">23</div>
                <div class="card-text">Pending orders</div>
            </div>
          </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 card-lg">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
