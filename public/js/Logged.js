window.onload=function(){
$("#RightBar a").css("top","-4px");    
    //declaracion de variables 
    //BOTONES
var btn_today=$("#btn-todays");
var btn_back=$("#back");
var btn_go=$("#go");
var btn_yours=$("#btn-yours");
var btn_cancel=$(".cancel");
var btn_change=$("#change");    
    //TABLAS
var today=$("#table-today");
var todays=$("#table-today tbody tr").length;
var yours=$("#table-yours");
var your=$("#table-yours tbody tr").length;
    //PROPIEDADES
var height2;
var sure=$("#sure");
var notes=$("#notes");    
var meet=$("#meetnumber");
var wall=$("#gray-window");
var confir=$(".confirmation");
var div=$("#problematico");
var Talert=$(".div:eq(0)");
var Yalert=$("#booked");
    
//Al hacer clikc en uno de los botones, se ajustara la altura del div contenedor y se animara con un fadeIn y un fadeOut
btn_yours.click(function(){
        today.fadeOut(350);
        Talert.fadeOut(350);
        console.log(your);
        if(your==0){
            Yalert.delay(350).fadeIn(350);
            div.animate({height:"150px"},100);
        }
        height2=parseInt(yours.css("height"))+60;
        div.animate({height: height2+"px"},100);
        yours.delay(600).fadeIn(350,"swing");
});
btn_today.click(function(){
        yours.fadeOut(350);
        Yalert.fadeOut(350);
        if(todays==0){
            Talert.delay(350).fadeIn(350);
            div.animate({height:"150px"},100);
        }
        height2=parseInt(today.css("height"))+60;
        div.animate({height: height2+"px"},100);
        today.delay(600).fadeIn(350,"swing");
});
btn_cancel.click(function(){
    wall.fadeIn(1000,"swing");
    meet.val(btn_cancel.val());
    confir.slideDown(800);
});
 btn_back.click(function(){
    confir.slideUp(800);
    meet.val("");
    wall.fadeOut(1000,"swing");
});
btn_go.click(function(){
    sure.slideUp(500);
    notes.slideDown(500);
});
btn_change.click(function(){
    notes.slideUp(250);
    sure.slideDown(250);
    confir.slideUp(800);
    meet.val("");
    wall.fadeOut(1000,"swing");
});
};
