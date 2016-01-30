$(document).ready(function() {
    IMAGE_DEFAULT_WIDTH = 100;
    IMAGE_DEFAULT_HEIGHT =  240;
    
    $("div#avatarlist").each(function(){
     var img_num = $(this).find(".images-container img").length;
     var container_width = (IMAGE_DEFAULT_WIDTH * img_num)+50;

     if(img_num>3){
       container_width = container_width/2;
     }
     else{
        $(this).css("height", (IMAGE_DEFAULT_HEIGHT/2));
     }
     $(this).find(".images-container").css("width", (container_width));
    })
});
