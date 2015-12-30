var baseDir = "http://tshirtcust.com/"
var canvas;
var tshirts = new Array(); //prototype: [{style:'x',color:'white',front:'a',back:'b',price:{tshirt:'12.95',frontPrint:'4.99',backPrint:'4.99',total:'22.47'}}]
var a;
var b;
//Sample JSON data. To be replaced by json data from existing one
// var json = ''; //Uncomment to use new tshirt
var json = '{"objects":[{"type":"image","left":228,"top":326,"width":96,"height":96,"fill":"rgb(0,0,0)","overlayFill":null,"stroke":null,"strokeWidth":1,"strokeDashArray":null,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"selectable":true,"hasControls":true,"hasBorders":true,"hasRotatingPoint":true,"transparentCorners":true,"perPixelTargetFind":false,"src":"' + baseDir + '/img/invisibleman.jpg","filters":[]}],"background":"rgb(127, 255, 0)","backgroundImage":"http://tshirtcust.com/img/crew_front.png","backgroundImageOpacity":1,"backgroundImageStretch":true}'

  $(document).ready(function() {
		//setup front side canvas
 		canvas = new fabric.Canvas('tcanvas', {
		  hoverCursor: 'pointer',
		  selection: true,
		  selectionBorderColor:'blue'
		});

    //Load tshirt or edit tshirt
    loadShirt('img/crew_front.png');
    //Temporary loader of edit section. Will remove after new year.
    if (window.location.href.indexOf("/edit") > -1){
      loadExistingData(json);
    }

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

    $("#shirtTypes").change(function(e){
      if($(this).val() == "1"){
        loadShirt('img/crew_front.png');
      }
      else if ($(this).val() == "2"){
        loadShirt('img/womens_crew_front.png');
      }
      else if ($(this).val() == "3"){
        loadShirt('img/mens_longsleeve_front.png');
      }
      else if ($(this).val() == "4"){
        loadShirt('img/mens_hoodie_front.png');
      }
      else if ($(this).val() == "5"){
        loadShirt('img/mens_tank_front.png');
      }
    });

		document.getElementById('add-text').onclick = function() {
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
	  	};
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
	  document.getElementById('remove-selected').onclick = function() {
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
	  };
	  document.getElementById('bring-to-front').onclick = function() {
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
	  };
	  document.getElementById('send-to-back').onclick = function() {
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
	  };

    // TO DO. Saving of the canvas data
    document.getElementById('proceed-to-payment').onclick = function() {
        var dataURL = canvas.toDataURL();
        $("#canvasData").val(dataURL);
        console.log("dataURL: "+dataURL);
        console.log("JSONData: "+JSON.stringify(canvas));
        alert(JSON.stringify(canvas));
        window.location.href=dataURL; //Uncomment to get the data
    };

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
		$('#text-bgcolor').miniColors({
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
		$('#text-fontcolor').miniColors({
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

		$('#text-strokecolor').miniColors({
			change: function(hex, rgb) {
			  var activeObject = canvas.getActiveObject();
		      if (activeObject && activeObject.type === 'text') {
		    	  activeObject.strokeStyle = this.value;
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

    //SHIRT COLORS
	   $('.color-preview').click(function(){
		   var color = $(this).css("background-color");
       changeBackgroundColor(color);
	   });

	   $('#flip').click(
		   function() {
			   	if ($(this).attr("data-original-title") == "Show Back View") {
			   		$(this).attr('data-original-title', 'Show Front View');
              loadShirt("img/crew_back.png");
			        a = JSON.stringify(canvas);
              canvas.clear();
              loadExistingData(b);
			    } else {
			    	$(this).attr('data-original-title', 'Show Back View');
              loadShirt("img/crew_front.png");
  			    	b = JSON.stringify(canvas);
              canvas.clear();
  			      loadExistingData(a);
			    }
			   	setTimeout(function() {
			   		canvas.calcOffset();
			    },200);
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
	    	$('#text-fontcolor').miniColors('value',selectedObject.fill);
	    	$('#text-strokecolor').miniColors('value',selectedObject.strokeStyle);
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
       console.log("Loading existing data..");
       canvas.loadFromJSON(data, canvas.renderAll.bind(canvas));
     }
   }
