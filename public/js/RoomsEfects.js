/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload=function(){
    
   //Declaracion de variables 
    document.getElementsByTagName("body")[0].addEventListener("mouseover",IN);
     var message=$("#message");//Mensaje
     var Wscreen = window.document.body.clientWidth;//Ancho de body
     var RoomList=$("#RoomList");//Div contenedor de las habitaciones 
     var rooms=document.getElementsByClassName("roomdesc");//Habitaciones
     
     for(x=0 ; x<document.getElementsByClassName("roomdesc").length; x++){// Evento onclick a los divs con los datos de las habitaciones 
         document.getElementsByClassName("roomdesc")[x].addEventListener("click",clickRoom);
     }
    
    
    //ANIMACIONES
    function slide(){
           RoomList.slideDown(1500,"swing");
           setInterval(function(){
               $(".roomdesc").each(
          function(){$(this).animate({opacity:"1"},1000);
           });
           } ,2000);
    }
    
    function OUT(){
        message.animate({left:"0%",top:"0px",opacity:"0",zIndex:"0"},800,function(){
        document.getElementsByClassName("Data")[0].style.zIndex = "1";
        document.getElementsByClassName("Data")[1].style.zIndex = "1";
        document.getElementById("RoomList").style.zIndex="1";
        clearInterval();
        });//1500
    }
    function IN(){
        if(Wscreen>1199){
        slide();    
        message.animate({left:"120%",top:"4px",opacity:"1.0"},2000);//2000
        document.getElementsByTagName("body")[0].removeEventListener("mouseover",IN);
        setInterval(OUT, 6000);
        
        }
        if(Wscreen<1199){
        slide();   
        message.animate({left:"0%",top:"100%",opacity:"1.0",width:"100%",height:"auto"},2000);//2000
        document.getElementsByTagName("body")[0].removeEventListener("mouseover",IN);
        document.getElementById("RoomList").style.zIndex="0";
        setInterval(OUT, 6000);//000
        }
    }
    
    //Funcion que se activa al hacer click en la descripcion de una habitacion
      function clickRoom(){
          function colors(){
              //COmprobamos el color del div y lo sustituimos para marcar al div clickeado correspondiente 
             for(i=0; i<rooms.length; i++){
                 if(rooms[i].style.backgroundColor==="rgb(51, 204, 255)"){
                     rooms[i].style.backgroundColor="#1A99B8";
                 }
             }
          }
          colors();
          //Al hacer click en uno de los div, pasamos el valor de un input oculto y deshabilitado, que contiene el id de la habitacion correspondiente, de manera que podamos pasar el id especificamente al controlador correspondiente 
           var roompicked=$(this);
           var roomID=roompicked.find("#roomId").val();
           document.getElementById("Pick").value=parseInt(roomID);
           roompicked.css("background-color","#33CCFF");
    };




};
   



