var baseDir = "http://tshirtcust.com/"
var canvas;
var backView_canvas;
var a;
var b;
//Sample shirts data
var tshirts = [
  {"tshirt_id": '1',
  "tshirt_name":"Men Sleeve Shirts",
  "front_src": "img/crew_front.png",
  "back_src": "img/crew_back.png"
  },
  {"tshirt_id": '2',
  "tshirt_name":"Women Short Sleeve Shirts",
  "front_src": "img/womens_crew_front.png",
  "back_src": "img/womens_crew_back.png"
  },
  {"tshirt_id": '3',
  "tshirt_name":"Long Sleeve Shirts",
  "front_src": "img/mens_longsleeve_front.png",
  "back_src": "img/mens_longsleeve_back.png"
  },
  {"tshirt_id": '4',
  "tshirt_name":"Hoodies",
  "front_src": "img/mens_hoodie_front.png",
  "back_src": "img/mens_hoodie_back.png"
  },
  {"tshirt_id": '5',
  "tshirt_name":"Tank tops",
  "front_src": "img/mens_tank_front.png",
  "back_src": "img/mens_tank_back.png"
  }];
var defaultTshirt = tshirts[0].front_src;

$(document).ready(function() {
  //setup front side canvas
  canvas = new fabric.Canvas('tcanvas', {
    hoverCursor: 'pointer',
    selection: true,
    selectionBorderColor:'blue'
  });

  canvas.on({
    'object:moving': function(e) {
      e.target.opacity = 0.5;
    },
    'object:modified': function(e) {
      e.target.opacity = 1;
    },
    'object:selected':onObjectSelected,
    'selection:cleared':onSelectedCleared
  });
  // piggyback on `canvas.findTarget`, to fire "object:over" and "object:out" events
  canvas.findTarget = (function(originalFn) {
    return function() {
      var target = originalFn.apply(this, arguments);
      if (target) {
        if (this._hoveredTarget !== target) {
          canvas.fire('object:over', { target: target });
          if (this._hoveredTarget) {
            canvas.fire('object:out', { target: this._hoveredTarget });
          }
          this._hoveredTarget = target;
        }
      }
      else if (this._hoveredTarget) {
        canvas.fire('object:out', { target: this._hoveredTarget });
        this._hoveredTarget = null;
      }
      return target;
    };
  })(canvas.findTarget);

  canvas.on('object:over', function(e) {
    //e.target.setFill('red');
    //canvas.renderAll();
  });

  canvas.on('object:out', function(e) {
    //e.target.setFill('green');
    //canvas.renderAll();
  });

  /*
  * Starts the loading of shirt
  *
  * Load shirt from existing data if on edit page
  */
  if (window.location.href.indexOf("/edit") > -1){
    loadExistingData( $('input[name=canvas_data]').val() );
  }
  else{
    loadShirt(defaultTshirt);
  }

  //TODO Load shirt here or on html page?

  /*
  * Controls section
  */
  $("#shirtTypes").change(function(e){
    b = ''; //Temporary solution for flip bug
    if($(this).val() == "0"){
      loadShirt(tshirts[0].front_src);
    }
    else if ($(this).val() == "1"){
      loadShirt(tshirts[1].front_src);
    }
    else if ($(this).val() == "2"){
      loadShirt(tshirts[2].front_src);
    }
    else if ($(this).val() == "3"){
      loadShirt(tshirts[3].front_src);
    }
    else if ($(this).val() == "4"){
      loadShirt(tshirts[4].front_src);
    }
  });

  $('.color-preview').click(function(){
    var color = $(this).css("background-color");
    changeBackgroundColor(color);
  });

  $("#add-text").click(function() {
    var text = $("#text-string").val();
    var textSample = new fabric.Text(text, {
      left: fabric.util.getRandomInt(0, 200),
      top: fabric.util.getRandomInt(0, 400),
      fontFamily: 'helvetica',
      angle: 0,
      fill: '#000000',
      scaleX: 0.5,
      scaleY: 0.5,
      fontWeight: '',
      hasRotatingPoint:true
    });
    canvas.add(textSample);
    canvas.item(canvas.item.length-1).hasRotatingPoint = true;
    $("#texteditor").css('display', 'block');
    $("#imageeditor").css('display', 'block');
  });

  $("#text-string").keyup(function(){
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'text') {
      activeObject.text = this.value;
      canvas.renderAll();
    }
  });

  $(".img-polaroid").click(function(e){
    var el = e.target;
    /*temp code*/
    var offset = 50;
    var left = fabric.util.getRandomInt(0 + offset, 200 - offset);
    var top = fabric.util.getRandomInt(0 + offset, 400 - offset);
    var angle = fabric.util.getRandomInt(-20, 40);
    var width = fabric.util.getRandomInt(30, 50);
    var opacity = (function(min, max){ return Math.random() * (max - min) + min; })(0.5, 1);

    fabric.Image.fromURL(el.src, function(image) {
      image.set({
        left: left,
        top: top,
        angle: 0,
        padding: 10,
        cornersize: 10,
        hasRotatingPoint:true
      });
      //image.scale(getRandomNum(0.1, 0.25)).setCoords();
      canvas.add(image);
    });
  });

  /*
  * Editor section (left)
  */
    $("#text-bold").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.fontWeight = (activeObject.fontWeight == 'bold' ? '' : 'bold');
        canvas.renderAll();
      }
    });
    $("#text-italic").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.fontStyle = (activeObject.fontStyle == 'italic' ? '' : 'italic');
        canvas.renderAll();
      }
    });
    $("#text-strike").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.textDecoration = (activeObject.textDecoration == 'line-through' ? '' : 'line-through');
        canvas.renderAll();
      }
    });
    $("#text-underline").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.textDecoration = (activeObject.textDecoration == 'underline' ? '' : 'underline');
        canvas.renderAll();
      }
    });
    $("#text-left").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.textAlign = 'left';
        canvas.renderAll();
      }
    });
    $("#text-center").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.textAlign = 'center';
        canvas.renderAll();
      }
    });
    $("#text-right").click(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.textAlign = 'right';
        canvas.renderAll();
      }
    });
    $("#font-family").change(function() {
      var activeObject = canvas.getActiveObject();
      if (activeObject && activeObject.type === 'text') {
        activeObject.fontFamily = this.value;
        canvas.renderAll();
      }
    });
    $('#text-bgcolor').minicolors({
      change: function(hex, rgb) {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'text') {
          activeObject.backgroundColor = this.value;
          canvas.renderAll();
        }
      },
      open: function(hex, rgb) {
        //
      },
      close: function(hex, rgb) {
        //
      }
    });
    $('#text-fontcolor').minicolors({
      change: function(hex, rgb) {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'text') {
          activeObject.fill = this.value;
          canvas.renderAll();
        }
      },
      open: function(hex, rgb) {
        //
      },
      close: function(hex, rgb) {
        //
      }
    });
    $('#text-strokecolor').minicolors({
      change: function(hex, rgb) {
        var activeObject = canvas.getActiveObject();
        if (activeObject && activeObject.type === 'text') {
          activeObject.stroke = this.value;
          canvas.renderAll();
        }
      },
      open: function(hex, rgb) {
        //
      },
      close: function(hex, rgb) {
        //
      }
    });

    /*
    * Editor section (right)
    */
    $("#bring-to-front").click(function() {
      var activeObject = canvas.getActiveObject(),
      activeGroup = canvas.getActiveGroup();
      if (activeObject) {
        activeObject.bringToFront();
      }
      else if (activeGroup) {
        var objectsInGroup = activeGroup.getObjects();
        canvas.discardActiveGroup();
        objectsInGroup.forEach(function(object) {
          object.bringToFront();
        });
      }
    });

    $("#send-to-back").click(function() {
      var activeObject = canvas.getActiveObject(),
      activeGroup = canvas.getActiveGroup();
      if (activeObject) {
        activeObject.sendToBack();
      }
      else if (activeGroup) {
        var objectsInGroup = activeGroup.getObjects();
        canvas.discardActiveGroup();
        objectsInGroup.forEach(function(object) {
          object.sendToBack();
        });
      }
    });

    $("#remove-selected").click(function() {
      var activeObject = canvas.getActiveObject(),
      activeGroup = canvas.getActiveGroup();
      if (activeObject) {
        canvas.remove(activeObject);
        $("#text-string").val("");
      }
      else if (activeGroup) {
        var objectsInGroup = activeGroup.getObjects();
        canvas.discardActiveGroup();
        objectsInGroup.forEach(function(object) {
          canvas.remove(object);
        });
      }
    });

    $('#flip').click(
      function() {
        var tshirtId = $("#shirtTypes").val();
        if ($(this).attr("data-original-title") == "Show Back View") {
          $(this).attr('data-original-title', 'Show Front View');
          loadShirt(tshirts[tshirtId].back_src);
          $("#shirtTypes").prop('disabled', true);
          a = JSON.stringify(canvas);
          canvas.clear();
          loadExistingData(b);
        } else {
          $(this).attr('data-original-title', 'Show Back View');
          loadShirt(tshirts[tshirtId].front_src);
          $("#shirtTypes").prop('disabled', false);
          backView_canvas = canvas;
          b = JSON.stringify(canvas);
          canvas.clear();
          loadExistingData(a);
        }
        setTimeout(function() {
          canvas.calcOffset();
        },200);
      });

    /*
    * Right Panel section
    */
    $("#save-tshirt").bind("click", function(e){
      e.preventDefault();

      var canvas_image = canvas.toDataURL();
      $( "#canvas_image" ).val( canvas_image );
      $( "#canvas_data" ).val( JSON.stringify( canvas ) );

      $(this).parents('form').submit();
    });

    $(".clearfix button,a").tooltip();
  });//doc ready

  function getRandomNum(min, max) {
    return Math.random() * (max - min) + min;
  }

  function onObjectSelected(e) {
    var selectedObject = e.target;
    $("#text-string").val("");
    selectedObject.hasRotatingPoint = true
    if (selectedObject && selectedObject.type === 'text') {
      //display text editor
      $("#texteditor").css('display', 'block');
      $("#text-string").val(selectedObject.getText());
      $('#text-fontcolor').minicolors('value',selectedObject.fill);
      $('#text-strokecolor').minicolors('value',selectedObject.strokeStyle);
      $("#imageeditor").css('display', 'block');
    }
    else if (selectedObject && selectedObject.type === 'image'){
      //display image editor
      $("#texteditor").css('display', 'none');
      $("#imageeditor").css('display', 'block');
    }
  }

  function onSelectedCleared(e){
    $("#texteditor").css('display', 'none');
    $("#text-string").val("");
    $("#imageeditor").css('display', 'none');
  }

  function setFont(font){
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'text') {
      activeObject.fontFamily = font;
      canvas.renderAll();
    }
  }

  function removeWhite(){
    var activeObject = canvas.getActiveObject();
    if (activeObject && activeObject.type === 'image') {
      activeObject.filters[2] =  new fabric.Image.filters.RemoveWhite({hreshold: 100, distance: 10});//0-255, 0-255
      activeObject.applyFilters(canvas.renderAll.bind(canvas));
    }
  }

  function loadShirt(src){
    canvas.setBackgroundImage(baseDir + src, canvas.renderAll.bind(canvas));
  }

  function changeBackgroundColor(color){
    canvas.backgroundColor = color;
    canvas.renderAll();
  }

  function loadExistingData(data){
    if(data.length != 0 ){
      canvas.loadFromJSON(data, canvas.renderAll.bind(canvas));
    }
  }
