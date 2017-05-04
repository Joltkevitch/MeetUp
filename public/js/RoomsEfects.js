/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload=function(){
   
    document.getElementsByTagName("body")[0].addEventListener("mouseover",IN);
    var message=$("#message");
     var Wscreen = window.document.body.clientWidth;
    
    function OUT(){
        message.animate({left:"0%",top:"0px",opacity:"0",zIndex:"0"},1500);
        clearInterval();
    }
    function IN(){
        if(Wscreen>1199){
        message.animate({left:"120%",top:"4px",opacity:"1.0"},2000);
        document.getElementsByTagName("body")[0].removeEventListener("mouseover",IN);
        setInterval(OUT, 10000);
        }
        if(Wscreen<1199){
        message.animate({left:"0%",top:"100%",opacity:"1.0",width:"100%",height:"auto"},2000);
        document.getElementsByTagName("body")[0].removeEventListener("mouseover",IN);
        setInterval(OUT, 10000);
        }
    }
    
    var e = document.getElementById("SelectRoom");
    var strUser = e.options[e.selectedIndex].value;
    
    $(function () {
                $('#datetimepicker1').dateTimePicker({
                    format:"dd MM YY"
                });
            });

    
};


