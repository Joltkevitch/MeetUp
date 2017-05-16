window.onload=function(){
    
    //Declaracion de variables 
    var Chosen_date=document.getElementById("ChosenD").value;// fecha escogida en el formulario anterior
    var d=new Date(Chosen_date);
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];//Dias de la semana
    var  months = Array("January", "February", "March", "April", "May", "June", "July", "Agost", "September", "Octuber", "November", "Dicember");//Meses 
    
    var trs=$("#table-body tr td");//Tds de la tabla 
    var hours= $(".hour");
    var users=document.getElementById("users");
    var attending=document.getElementById("attending");
    var filter=document.getElementById("finder");
   
    var AllUsers;
    var value;//Hora contenida dentro del span
    
    //Asignamos la fecha dada en el formulario anterior 
document.getElementById("today").innerHTML=(days[d.getDay()]+", "+months[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear());

document.getElementById("finder").addEventListener("keyup",filterInput);

//Filtro para encontrar al usuario deseado mediante un input
function filterInput(){
       AllUsers =  document.getElementById("users").getElementsByTagName("option");
       filterValue=filter.value.toUpperCase();
       for(i=0;i < AllUsers.length; i++){
           if(AllUsers[i].innerHTML.toUpperCase().indexOf(filterValue) > -1 ){
               AllUsers[i].style.display="";
           }
           else{
               AllUsers[i].style.display="none";
           }
       }    
}

 function enableHours(){}

//Controlamos la capacidad de clickear sobre las horas 
trs.click(function(){
    $(".add").css("display","none");//Removemos los elementos con la clase add
    trs.css("background-color","rgba(0,153,153,0.05)"   ); 
    $(this).find(".add").css("display","inline-block")//añadimos un enlace con la clase .add
    value=$(this);//Hora contenida dentro del span
    $(this).css({"background-color":"rgba(0,153,153,0.70)"});// Cambiamos el color de fondo para que se distinga 
    disabledHours();
    return value;
});
//Al hacer doble click sobre una fila, llamamos al evento click del boton add, para que cumplan las misma funcion
trs.bind("dblclick",function(){
    $(this).children(".add").trigger("click");
});
$(".add").click(function(){
    $("#gray-window").fadeIn(1000,"linear");
    $("#ReservationEnd").slideDown(1000,"swing");
    
    //Asignar hora de inicio de reunion 
    $("#hour").html(value.find("span").text());
    $("#SA").val(value.find("span").text());
    $("#future-hours").empty();//Vaciar  el select para poner nuevos valores 

    //Asignamos las posibles horas que pueda durar la reunion
       for(i=value.find("span").index(".hour")+1;i<$(".hour").length ;i++){
           if(!$("#table-body tr td:eq("+i+")").hasClass("disabled")){// Si el td de la posicion i no tiene la clase disables 
               $("#future-hours").append("<option value='"+$(".hour:eq("+i+")").text()+"'>"+$(".hour:eq("+i+")").text()+"</option> ");//Asignara hasta que encuentre un td con la clase disabled
           }
           else{
               $("#future-hours").append("<option value='"+$(".hour:eq("+i+")").text()+"'>"+$(".hour:eq("+i+")").text()+"</option> ");//Asignara hasta que encuentre un td con la clase disabled
               break;
           }
        }
    });

//Deshabilitamos las horas que ya estan selecionados segun la base de datos, para que el usuario no pueda seleccionarlas 
function disabledHours(){
    for(x=0; x<meetings.length; x++){
        for(i=0;i<hours.length ;i++){
        var hour=$(".hour:eq("+i+")").html();
        if(meetings[x].timeFrom === hour){
                while(meetings[x].timeTo !== hour){
                hour=$(".hour:eq("+i+")").html();
                $("#table-body tr td:eq("+i+")").unbind().css("background-color","rgba(0, 43, 43, 0.5)").addClass("disabled");
                if(meetings[x].timeTo === hour && $("#table-body tr td:eq("+(i+1)+")").css("background-color") !=="rgba(0, 43, 43, 0.5)" ){
                $("#table-body tr td:eq("+i+")").bind({
                    click:function()
                    {
                   $(".add").css("display","none");
                   $(this).find(".add").css("display","inline-block");
                    value=$(this);
                     trs.css("background-color","rgba(0,153,153,0.05)"   ); 
                    disabledHours();
                    $(this).css({"background-color":"rgba(0,130,130,0.70)"});
                      },
                  dblclick:function()
                     {
                 $(this).children(".add").click();
                     }
                }).css("background-color","rgba(0, 100, 100, 0.5)").addClass("disabled-half");
                }
                i++;
                }
            }    
        }
    }
}
 // Deshabilitamos las horas ya reservadas en el calendario
    disabledHours();
    
    //Anadimos a todos los "option" dentro del select con el id "users" el evento doble click con la funcion "changeATT"
   for(i=0;i<users.options.length;i++){
       users.getElementsByTagName("option")[i].addEventListener("dblclick",changeATT);
     }
     
     //Al hacer doble click sobre cualquier option, se le removera su antiguo evento y se le anadira el mismo con otra funcion que cumplira el mismo papel
     //changeATT nos permite mover un option del select users al select attending (usuarios que iran a la reunion)
     
   function changeATT(){
       user=this;
       user.removeEventListener("dblclick",changeATT);
       user.addEventListener("dblclick",changeUSER);
       attending.appendChild(user);
       //users.removeChild(user);
   }
   function changeUSER(){
       user=this;
       user.removeEventListener("dblclick",changeUSER);
       user.addEventListener("dblclick",changeATT);
      users.appendChild(user);
   }

$(".C").click(function(){
       $("#ReservationEnd").slideUp(1000,"swing");
       $("#gray-window").fadeOut(1000,"linear");
        i=0;   
        if( attending.getElementsByTagName("option").length > 0){
        do{
        user=attending.getElementsByTagName("option")[i];
        users.appendChild(user);
         }while( i < attending.getElementsByTagName("option").length);
         for(i=0;i<users.options.length;i++){
               users.getElementsByTagName("option")[i].addEventListener("dblclick",changeATT);
        }
    }
});
};