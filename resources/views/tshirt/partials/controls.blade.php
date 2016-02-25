<div class="col-md-4">
  <div class="tabbable">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tab1" data-toggle="tab">T-Shirt Options</a></li>
      <li><a href="#tab2" data-toggle="tab">Add Text and Images</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab1">
        <div class="well">
          <select id="shirtTypes" class="btn btn-primary">
            <option value="0" selected="selected">Men Sleeve Shirts</option>
            <option value="1">Women Short Sleeve Shirts</option>
            <option value="2">Long Sleeve Shirts</option>
            <option value="3">Hoodies</option>
            <option value="4">Tank tops</option>
          </select>
        </div>
        <div class="well">
          <ul class="list-inline" id="colorSelector">
            <li class="color-preview" title="White" style="background-color:#ffffff;"></li>
            <li class="color-preview" title="Dark Heather" style="background-color:#616161;"></li>
            <li class="color-preview" title="Gray" style="background-color:#f0f0f0;"></li>
            <li class="color-preview" title="Charcoal" style="background-color:#5b5b5b;"></li>
            <li class="color-preview" title="Black" style="background-color:#222222;"></li>
            <li class="color-preview" title="Heather Orange" style="background-color:#fc8d74;"></li>
            <li class="color-preview" title="Heather Dark Chocolate" style="background-color:#432d26;"></li>
            <li class="color-preview" title="Salmon" style="background-color:#eead91;"></li>
            <li class="color-preview" title="Chesnut" style="background-color:#806355;"></li>
            <li class="color-preview" title="Dark Chocolate" style="background-color:#382d21;"></li>
            <li class="color-preview" title="Citrus Yellow" style="background-color:#faef93;"></li>
            <li class="color-preview" title="Avocado" style="background-color:#aeba5e;"></li>
            <li class="color-preview" title="Kiwi" style="background-color:#8aa140;"></li>
            <li class="color-preview" title="Irish Green" style="background-color:#1f6522;"></li>
            <li class="color-preview" title="Scrub Green" style="background-color:#13afa2;"></li>
            <li class="color-preview" title="Teal Ice" style="background-color:#b8d5d7;"></li>
            <li class="color-preview" title="Heather Sapphire" style="background-color:#15aeda;"></li>
            <li class="color-preview" title="Sky" style="background-color:#a5def8;"></li>
            <li class="color-preview" title="Antique Sapphire" style="background-color:#0f77c0;"></li>
            <li class="color-preview" title="Heather Navy" style="background-color:#3469b7;"></li>
            <li class="color-preview" title="Cherry Red" style="background-color:#c50404;"></li>
            <li class="color-preview" title="Chartreuse" style="background-color:#7FFF00;"></li>
          </ul>
        </div>
      </div>
      <div class="tab-pane" id="tab2">
        <div class="well">
          <div class="input-append form-inline form-group">
            <input class="form-control" id="text-string" type="text" placeholder="Add text here...">
            <button id="add-text" class="btn btn-default" title="Add text"><i class="glyphicon glyphicon-share-alt"></i> Add text</button>
            <hr>
          </div>
          <div id="avatarlist">
            <div class="images-container"></div>
          </div>
        </div>
        @if( !Auth::user()->isAdmin() )
          <div class="well">
            {!! Form::open(['action' => 'FileEntryController@store', 'enctype' => 'multipart/form-data']) !!}
              <div class="form-group">
                  <label for="images">Upload your own sticker</label>
                  <input type="file" name="frontFile" id="images" required/>
                  <p class="help-block">Images should be in PNG/JPG format.<br>Preferred resolution: 200x200 max.</p>
                  <input type="submit" class="btn btn-default btn-sm" value="Upload Image">
              </div>
            {!! Form::close() !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
