window.onload = function () {

    //Otorgar evento para SlideToggle div con Form/div con Info
    document.getElementById("edit").addEventListener("click", changePanel);

    //Declaracion de variables 
    var data = document.getElementsByClassName("data");//Localizacion, titulo, nombres, email
    var info = $("#UserInfo");//div contenedor de la informacion del usuario
    var update = $("#update");// div para actualizar los datos del usuario
    var form = document.getElementById("form");//formualario 
    var inputs=document.getElementsByTagName("input");//inputs para actualizar

    //Expresiones regulares 
    var emailTest = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var TN = /^[a-zA-Z\-\s]{3,30}$/;// Para los titulo y nombres 

    //Datos del usuario logueado
    var first = document.getElementById("U_first").innerHTML;//Primer nombre del usuario logueado
    var last = document.getElementById("U_last").innerHTML;//Apellido del usuario logueado
    var title = document.getElementById("U_tit").innerHTML;//Titulo del usuario logueado
    var email = document.getElementById("U_email").innerHTML;//Email del usuario logueado
    var values = [first,last,title,email];

    //Funcion para indicar en los inputs los valores originales del usuario
    function addInputs() {
        for (i = 0; i < 4; i++) {
            inputs[i].placeholder = values[i];
            inputs[i].addEventListener("change",validate);//Añadimos un metodo para validar los inputs 
        }
    }
    addInputs();

    //SlideToggle div update/UserInfo
    function changePanel() {
        update.slideToggle("slow");
        info.slideToggle("slow");
    }

    //Validar los inputs, mediante colores [verde=correcto, rojo=incorrecto, blanco=null]
    function validate() {
        if (inputs[0].value === "") {
            inputs[0].style.backgroundColor = "white";
            inputs[0].style.borderColor = "white";
        }
        else {
            if (TN.test(inputs[0].value)) {
                inputs[0].style.backgroundColor = "#9ACC7D";
                inputs[0].style.borderColor = "#5F993E";
            }
            else {
                inputs[0].style.backgroundColor = "#FF8983";
                inputs[0].style.borderColor = "#9E0900";
            }
        }
        if (inputs[1].value === "") {
            inputs[1].style.backgroundColor = "white";
            inputs[1].style.borderColor = "white";
        }
        else {
            if (TN.test(inputs[1].value)) {
                inputs[1].style.backgroundColor = "#9ACC7D";
                inputs[1].style.borderColor = "#5F993E";
            }
            else {
                inputs[1].style.backgroundColor = "#FF8983";
                inputs[1].style.borderColor = "#9E0900";
            }
        }
        if (inputs[2].value === "") {
            inputs[2].style.backgroundColor = "white";
            inputs[2].style.borderColor = "white";
        }
        else {
            if (TN.test(inputs[2].value)) {
                inputs[2].style.backgroundColor = "#9ACC7D";
                inputs[2].style.borderColor = "#5F993E";
            }
            else {
                inputs[2].style.backgroundColor = "#FF8983";
                inputs[2].style.borderColor = "#9E0900";
            }
        }
        if (inputs[3].value === "") {
            inputs[3].style.backgroundColor = "white";
            inputs[3].style.borderColor = "white";
        }
        else {
            if (emailTest.test(inputs[3].value)) {
                inputs[3].style.backgroundColor = "#9ACC7D";
                inputs[3].style.borderColor = "#5F993E";
            }
            else {
                inputs[3].style.backgroundColor = "#FF8983";
                inputs[3].style.borderColor = "#9E0900";
            }
        }
    }
}