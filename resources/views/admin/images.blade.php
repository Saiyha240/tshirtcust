@extends('layouts.admin')

@section('content')
<h1>Images</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <h4>Add New</h4>
        <form method="post" enctype="multipart/form-data">
          <label for="images">File Input</label>
          <input type="file" name="frontFile" id="images" required/>
          <p class="help-block">Images should be in PNG format.</p>
          <input type="submit" class="btn btn-default" value="Upload Image" name="submit">
        </form>
      </div>
      <div class="col-md-8">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>#</td>
                  <td>Image</td>
                  <td>Name</td>
                  <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data -->
                <tr>
                  <td>1</td>
                  <td><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAIAAAD/gAIDAAABL0lEQVR4nO3cMQ6CQBRAQVFvaWOsbT2FrbVn9QaEJ26QZKZHNi+/WMjidLpeDixz3HoBeyJWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWcN7qxu/74+trb6/nD1eynMkKxArECsQKxArECsQKxArECgbu4Of36Gt24eN+eZ7JCsQKxArECsQKxArECsQKxAqm+S9Z9/imfNyaTVYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFYgViBWIFaw2SmaPTJZgViBWIFYgViBWIFYgViBWMGqHfz8mZP/PAe/5rnCZAViBWIFYgViBWIFYgViBWIFA9/BjzsH779odkCsQKxArECsQKxArECsQKzgA29sHs723zLdAAAAAElFTkSuQmCC" alt="..." height="100" width="100" class="img-responsive img-thumbnail"></td>
                  <td><a>Sample Image</a></td>
                  <td><button class="btn btn-primary">Remove</button></td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
