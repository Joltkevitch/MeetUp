window.onload=function(){
    
    //declaracion de variables 
            //BOTONES
var btn_today=$("#btn-todays");
//var btn_past=$("#btn-past");
var btn_yours=$("#btn-yours");
        //TABLAS
var today=$("#table-today");
var past=$("#table-past");
var yours=$("#table-yours");

//PROPIEDADES
var height2;
var div=$("#problematico");

//Al hacer clikc en uno de los botones, se ajustara la altura del div contenedor y se animara con un fadeIn y un fadeOut
btn_yours.click(function(){
        today.fadeOut(350);
       // past.fadeOut(350);
        height2=parseInt(yours.css("height"))+60;
        div.animate({height: height2+"px"},100);
         yours.delay(600).fadeIn(350,"swing");
});
btn_today.click(function(){
        yours.fadeOut(350);
       // past.fadeOut(350);
        height2=parseInt(today.css("height"))+60;
        div.animate({height: height2+"px"},100);
        today.delay(600).fadeIn(350,"swing");
});
/*btn_past.click(function(){
        yours.fadeOut(350);
        today.fadeOut(350);
        height2=parseInt(past.css("height"))+60;
        div.animate({height: height2+"px"},100);
        past.delay(600).fadeIn(350,"swing");
});*/

};
