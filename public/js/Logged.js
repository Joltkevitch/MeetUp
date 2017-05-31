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
var today=$("#div1");
var table_t=$("#table-today");
var todays=$("#table-today tbody tr").length;
var yours=$("#div2");
var table_y=$("#table-yours");
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
    
//Al hacer clikc en uno de los botones, se ajustara la altura del div contenedor y se animara con un slideUp y un slideDown
btn_yours.click(function(){
        table_t.animate({opacity:"0"},300);
        Talert.animate({opacity:"0"},350).delay(350).slideUp();
        today.delay(351).slideUp(800);
        if(your==0){
            yours.delay(200).slideDown(600,"swing");
            Yalert.delay(750).slideDown().animate({opacity:"1"},750);
        }
        yours.delay(200).slideDown(600,"swing");
        table_y.delay(750).animate({opacity:"1"},750);
});
btn_today.click(function(){
        table_y.animate({opacity:"0"},300);
        Yalert.animate({opacity:"0"},350).delay(350).slideUp();
        yours.delay(351).slideUp(800);
        if(todays==0){
            today.delay(200).slideDown(600,"swing");
            Talert.delay(750).slideDown().animate({opacity:"1"},500);
        }
        today.delay(200).slideDown(600,"swing");
        table_t.delay(750).animate({opacity:"1"},750);
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
