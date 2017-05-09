window.onload=function(){
    
    var Chosen_date=document.getElementById("ChosenD").value;// fecha escogida en el formulario anterior
    var d=new Date(Chosen_date);
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];//Dias de la semana
    var  months = Array("January", "February", "March", "April", "May", "June", "July", "Agost", "September", "Octuber", "November", "Dicember");//Meses 
    var trs=$("#table-body tr td");
    var hours= $(".hour");
    
    //Asignamos la fecha dada en el formulario anterior 
document.getElementById("today").innerHTML=(days[d.getDay()]+", "+months[d.getMonth()]+" "+d.getDate()+", "+d.getFullYear());

//Controlamos la capacidad de clickear sobre las horas 
trs.bind("click",function(){
    for(i=0;i<hours.length;i++){
        var hour=$(".hour:eq("+i+")").html();
        alert(hour);
    }
    $("a").remove(".add");
    trs.css("background-color","rgba(0,153,153,0.05)");
    $(this).append("<a href='#' class='add'><span class='glyphicon glyphicon-plus'> </span>add</a>");
    $(this).css({"background-color":"rgba(0,153,153,0.70)"});
});

alert(meetings.length);
}