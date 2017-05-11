window.onload=function(){
    
    var Chosen_date=document.getElementById("ChosenD").value;// fecha escogida en el formulario anterior
    var d=new Date(Chosen_date);
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];//Dias de la semana
    var  months = Array("January", "February", "March", "April", "May", "June", "July", "Agost", "September", "Octuber", "November", "Dicember");//Meses 
    var trs=$("#table-body tr td");//Tds de la tabla 
    var hours= $(".hour");
    var value;
    
    //Asignamos la fecha dada en el formulario anterior 
document.getElementById("today").innerHTML=(days[d.getDay()]+", "+months[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear());
//Controlamos la capacidad de clickear sobre las horas 
trs.bind("click",function(){
    $(".add").css("display","none");//Removemos los elementos con la clase add
    trs.css("background-color","rgba(0,153,153,0.05)"   ); 
    $(this).find(".add").css("display","inline-block")//añadimos un enlace con la clase .add
    //alert($(this).find("span").text());
    value=$(this).find("span").text();
    $(this).css({"background-color":"rgba(0,153,153,0.70)"});// Cambiamos el color de fondo para que se distinga 
    disabledHours();
    return value;
});
trs.bind("dblclick",function(){
     
    alert(value);
    $(this).children(".add").trigger("click");
   
});
$(".add").click(function(){
    $("#hour").html(value);
    });



function disabledHours(){
    for(x=0; x<meetings.length; x++){
        for(i=0;i<hours.length ;i++){
        var hour=$(".hour:eq("+i+")").html();
        if(meetings[x].timeFrom == hour){
                while(meetings[x].timeTo != hour){
                hour=$(".hour:eq("+i+")").html();
                $("#table-body tr td:eq("+i+")").unbind().css("background-color","rgba(0, 43, 43, 0.5)");
                i++;
                }
            }    
        }
    }
}
    disabledHours(); 
};