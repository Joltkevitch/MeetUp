window.onload=function(){
    
  var trs=$("tbody tr"); 
    
  var btn_change=$(".role");    
  var btn_disabled=$(".disableds");    
  var btn_enable=$(".enable");   
  var btn_no=$("#sure .btn-warning");   
  var btn_yes=$("#sure .btn-danger");   
    
  var RedWindow=$(".red");
  var BlueWindow=$(".blue");
  var GreenWindow=$(".green");
    
  var sure=$("#sure");
  var warn=$("#warn");
     
  var inputDis=$("#dis");
  var inputEn=$("#en");
  var inputChange=$("#Change");
  var filter=document.getElementById("finder");
    
  var working;
    
  document.getElementById("finder").addEventListener("keyup",filterInput);
    
    for(i = 0; i< trs.length; i++){
    working=$(".working:eq("+i+")");    
        if(working.html() == "1"|| working.html() == "Yes" ){
        working.html("Yes");
        working.parent().css({"background-image":"linear-gradient(to right,  rgba(10,50,10,0.5),rgba(50,130,50,0.5) )"});
        working.parent().hover(function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(10,50,10,0.5),rgba(50,130,50,0.5) )");
        }, function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(50,130,50,0.5),rgba(10,50,10,0.5) )");
        });
        }
        else{
        working.html("No");    
        working.parent().css("background","linear-gradient(to right,  rgba(60,20,20,0.8),rgba(120,50,50,0.8) )");
        working.parent().hover(function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(60,20,20,0.5),rgba(130,50,50,0.5) )");
        }, function(){
        $(this).css("background-image", "linear-gradient(to right,  rgba(130,50,50,0.5),rgba(60,20,20,0.5) )");
        });
        }
    }
    
    btn_disabled.click(function(){
        RedWindow.fadeIn(500,"swing");
        sure.delay(250).slideDown(500,"linear")
        warn.html("Are you sure you you want to disabled this user?");
        inputDis.val($(this).val());
    });
    
    btn_enable.click(function(){
        GreenWindow.fadeIn(500,"swing");
        sure.delay(250).slideDown(500,"linear")
        warn.html("You really want to enable this user?");
        inputEn.val($(this).val());
    });
    
    btn_change.click(function(){
        BlueWindow.fadeIn(500,"swing");
        sure.delay(250).slideDown(500,"linear")
        warn.html("Are you sure you want to change this user's permitions?");
        inputChange.val($(this).val());
    });
    
    btn_no.click(function(){
        sure.slideUp(500,"linear")
        RedWindow.delay(250).fadeOut(500,"swing");
        GreenWindow.delay(250).fadeOut(500,"swing");
        BlueWindow.delay(250).fadeOut(500,"swing");
        inputDis.val("");
        inputEn.val("");
        inputChange.val("");
    });
    
    function filterInput(){
       AllUsers =  document.getElementsByClassName("users");
       filterValue=filter.value.toUpperCase();
       for(i=0;i < AllUsers.length; i++){
       data=AllUsers[i].getElementsByTagName("td");
           if(data[0].innerHTML.toUpperCase().indexOf(filterValue) > -1){
               data[0].parentElement.style.display="";
           }
           else{
               data[0].parentElement.style.display="none";
           }
       }
    }
    
};