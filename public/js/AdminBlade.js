window.onload=function(){
    
  var trs=$("tbody tr"); 
    
  var btn_change=$("#role");    
  var btn_disabled=$("#disabled");    
  var btn_enable=$("#enable");    
    
  var working;
    
    for(i = 0; i< trs.length; i++){
    working=$(".working:eq("+i+")");    
        if(working.html() == "1"){
        btn_disabled.removeClass("disabled");
        btn_enable.addClass("disabled");
        working.html("Yes");
        working.parent().css({"background-image":"linear-gradient(to right,  rgba(10,50,10,0.5),rgba(50,130,50,0.5) )"});
        working.parent().hover(function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(10,50,10,0.5),rgba(50,130,50,0.5) )");
        }, function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(50,130,50,0.5),rgba(10,50,10,0.5) )");
        });
        }
        else{
        btn_enable.removeClass("disabled");
        btn_disabled.addClass("disabled");
        working.html("No");    
        working.parent().css("background","linear-gradient(to right,  rgba(60,20,20,0.8),rgba(120,50,50,0.8) )");
        working.parent().hover(function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(60,20,20,0.5),rgba(130,50,50,0.5) )");
        }, function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(130,50,50,0.5),rgba(60,20,20,0.5) )");
        });
        }
    }
};