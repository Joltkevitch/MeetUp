window.onload=function(){
    
var btn_today=$("#btn-todays");
var btn_past=$("#btn-past");
var btn_yours=$("#btn-yours");

var today=$("#table-today");
var past=$("#table-past");
var yours=$("#table-yours");


btn_yours.click(function(){
        today.fadeOut(500);
        past.fadeOut(500);
         yours.delay(500).fadeIn(500,"swing");
});
btn_today.click(function(){
        yours.fadeOut(500);
        past.fadeOut(500);
        today.delay(500).fadeIn(500,"swing");

});
btn_past.click(function(){
        yours.fadeOut(500);
        today.fadeOut(500);
        past.delay(500).fadeIn(500,"swing");

// captura el height de la tabla que actualmente este activa, y animala altura del div contenedor a esa altura + 60px por ejemplo
});

};
