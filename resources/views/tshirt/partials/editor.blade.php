<div class="col-md-6">
  <div align="center" style="min-height: 40px;">
    <div class="clearfix">
      <div class="btn-group pull-left" id="texteditor" style="display:none">
        <button id="font-family" class="btn btn-default" data-toggle="dropdown" title="Font Style"><i class="fa fa-font"></i></i></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="font-family-X">
          <li><a tabindex="-1" href="#" onclick="setFont('Arial');" class="Arial">Arial</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Helvetica');" class="Helvetica">Helvetica</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Myriad Pro');" class="MyriadPro">Myriad Pro</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Delicious');" class="Delicious">Delicious</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Verdana');" class="Verdana">Verdana</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Georgia');" class="Georgia">Georgia</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Courier');" class="Courier">Courier</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Comic Sans MS');" class="ComicSansMS">Comic Sans MS</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Impact');" class="Impact">Impact</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Monaco');" class="Monaco">Monaco</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Optima');" class="Optima">Optima</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Hoefler Text');" class="Hoefler Text">Hoefler Text</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Plaster');" class="Plaster">Plaster</a></li>
          <li><a tabindex="-1" href="#" onclick="setFont('Engagement');" class="Engagement">Engagement</a></li>
        </ul>
        <button id="text-bold" class="btn btn-default" data-original-title="Bold"><i class="fa fa-bold"></i></i></button>
        <button id="text-italic" class="btn btn-default" data-original-title="Italic"><i class="fa fa-italic"></i></i></button>
        <button id="text-underline" class="btn btn-default" title="Underline" style=""><i class="fa fa-underline"></i></i></button>
        <button id="text-strike" class="btn btn-default" title="Strike" style=""><i class="fa fa-strikethrough"></i></button>
        <a class="btn btn-default" href="#" rel="tooltip" data-placement="top" data-original-title="Font Color"><input type="hidden" id="text-fontcolor" class="color-picker" size="7" value="#000000"></a>
        <a class="btn btn-default" href="#" rel="tooltip" data-placement="top" data-original-title="Font Border Color"><input type="hidden" id="text-strokecolor" class="color-picker" size="7" value="#000000"></a>

      </div>
      <div class="pull-right" align="" id="imageeditor" style="display:none">
        <div class="btn-group">
          <button class="btn btn-default" id="bring-to-front" title="Bring to Front"><i class="fa fa-arrow-circle-o-up"></i></i></button>
          <button class="btn btn-default" id="send-to-back" title="Send to Back"><i class="fa fa-arrow-circle-o-down"></i></i></button>
          <button id="remove-selected" class="btn btn-default" title="Delete selected item"><i class="fa fa-trash-o"></i></i></button>
        </div>
      </div>
      <div class="pull-right">
        <button id="flip" type="button" class="btn btn-default" title="Show Back View"><i class="fa fa-retweet"></i></i></button>
      </div>
    </div>
  </div>
  <!--	EDITOR      -->
  <div id="shirtDiv" class="page" style="width: 530px; height: 630px; position: relative; background-color: rgb(255, 255, 255);">
    <div id="drawingArea" style="z-index: 10;width: 530px;height: 630px;">
      <canvas id="tcanvas" width="530" height="630" class="hover" style="-webkit-user-select: none;"></canvas>
    </div>
  </div>
</div>
