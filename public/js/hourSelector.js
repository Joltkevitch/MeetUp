window.onload=function(){
    
    var Chosen_date=document.getElementById("ChosenD").value;
    var d=new Date(Chosen_date);
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var  months = Array("January", "February", "March", "April", "May", "June", "July", "Agost", "September", "Octuber", "November", "Dicember");
    var trs=$("#table-body tr");
    
    //Asignamos la fecha dada en el formulario anterior 
document.getElementById("today").innerHTML=(days[d.getDay()]+", "+months[d.getMonth()]+" "+d.getDate()+", "+d.getYear());

trs.bind("click",function(){
    for(i=0 ; i < trs.length ; i++){

        if(document.getElementsByTagName("tr")[i].style.backgroundColor=="#f0ad4e"){
            document.getElementsByTagName("tr")[i].style.backgroundColor="white";
        }
    }

    $(this).css({"background-color":"#f0ad4e"});
});
        
}