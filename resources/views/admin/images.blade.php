@extends('layouts.admin')

@section('content')
<h1>Images</h1>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <h4>Add New</h4>
          {!! Form::open(['route' => 'admin.images.store', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <label for="front">Name</label>
                <input type="text" name="name" id="name" class="form-control" required/>
            </div>
          	<div class="form-group">
                <label for="images">File Input</label>
                <input type="file" name="frontFile" id="images" required/>
                <p class="help-block">Images should be in PNG format.</p>
            </div>
            <input type="submit" class="btn btn-default btn-sm" value="Upload Image" name="submit">
          {!! Form::close() !!}
      </div>
      <div class="col-md-8">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>#</td>
                  <td>Image</td>
                  <td>Name</td>
                  <td>Filename</td>
                  <td>Remove</td>
                </tr>
            </thead>
            <tbody>
                <!-- Sample data -->
                @foreach($entries as $entry)
                    <tr>
                        <td>{{ $entry->id }}</td>
                        <td></td>
                        <td>{{ $entry->filename }}</td>
                        <td>{{ $entry->original_filename }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
