@extends('layouts.admin')

@section('content')
<h1>Shirt Layouts</h1>
<div class="container-fluid">
	<div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <h4>Add New</h4>
        <form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="front">Name</label>
						<input type="text" name="name" id="name" class="form-control" required/>
					</div>
					<div class="form-group">
          	<label for="front">Front</label>
          	<input type="file" name="frontFile" id="front" required/>
          	<p class="help-block">Shirts should be in PNG format.</p>
					</div>
					<div class="form-group">
          	<label for="back">Back</label>
        		<input type="file" name="backFile" id="back" required/>
          	<p class="help-block">Shirts should be in PNG format.</p>
					</div>
          <input type="submit" class="btn btn-default" value="Upload Shirt" name="submit">
        </form>
      </div>
      <div class="col-md-8">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>#</td>
                  <td>Front</td>
                  <td>Back</td>
                  <td>Name</td>
                  <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data -->
                <tr>
                  <td>1</td>
                  <td><img src="../img/crew_front.png" alt="..." height="100" width="100" class="img-responsive img-thumbnail"></td>
                  <td><img src="../img/crew_back.png" alt="..." height="100" width="100" class="img-responsive img-thumbnail"></td>
                  <td><a>Sample Shirt</a></td>
                  <td><button class="btn btn-primary">Remove</button></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
