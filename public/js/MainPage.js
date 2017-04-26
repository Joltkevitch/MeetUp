// JavaScript source code
window.onload=function(){
    
    // Asignacion de eventos a los botones de Log In y Register
        document.getElementById("buttonLog").addEventListener("click", login);
        document.getElementById("register").addEventListener("click", register);
        
         //Asignacion de funciones a los inputs en Evento ONCHANGE
        document.getElementById("newEmail").addEventListener("change", ValidateEmail);
        document.getElementById("Name").addEventListener("change", ValidateName);
        document.getElementById("LastName").addEventListener("change", ValidateLast);
        document.getElementById("Title").addEventListener("change", ValidateTitle);
  
        //Expresiones regulares para validar el email introducido y los nombres
        var emailTest=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var Names= /^[a-zA-Z\-]+$/;
        var Title=/^[a-zA-Z\-\s]+$/;
        
        //Variables para coger los valores de los inputs tipo [TEXT/EMAIL] del formulario
        var email=document.getElementById("newEmail");
        var Username=document.getElementById("Name");
        var Last=document.getElementById("LastName");
        var title=document.getElementById("Title");
        
        // Funcion para cambiar de formulario
     function register(){
         document.getElementById("PageTitle").innerHTML="MeetUp-Register";
         $("#login").slideUp(500, "linear",function(){
         $("#registerForm").fadeIn(600,"linear");
         $("#log").fadeIn(500,"linear");
         });
    };
      function login(){
          document.getElementById("PageTitle").innerHTML="MeetUp-Log in";
             $("#registerForm").slideUp(500,"swing",function(){
             $("#login").fadeIn(500,"linear");
             $("#log").fadeOut(500,"linear");
             });
      };
     //Las funciones de validacion solo cambiaran el color del input dependiendo de si encaja con la expresion regular o no
    //Funcio que valida el Email
    function ValidateEmail(){
        if(email.value===""){
            email.style.backgroundColor="white";
            email.style.borderColor="white";
        }
        else{
        if(emailTest.test(email.value)){
            email.style.backgroundColor="#9ACC7D";
            email.style.borderColor="#5F993E";
        }
        else{
            email.style.backgroundColor="#FF8983";
            email.style.borderColor="#9E0900";
           }
        }
    };
    //Funcion que valida el nombre
    function ValidateName(){
          if(Username.value===""){
            Username.style.backgroundColor="white";
            Username.style.borderColor="white";
        }
        else{
        if(Names.test(Username.value)){
            Username.style.backgroundColor="#9ACC7D";
            Username.style.borderColor="#5F993E";
        }
        else{
            Username.style.backgroundColor="#FF8983";
            Username.style.borderColor="#9E0900";
            }
        }
    };
    //Funcion que valida el apellido
    function ValidateLast(){
         if(Last.value===""){
            Last.style.backgroundColor="white";
            Last.style.borderColor="white";
        }
        else{
        if(Names.test(Last.value)){
            Last.style.backgroundColor="#9ACC7D";
            Last.style.borderColor="#5F993E";
        }
        else{
            Last.style.backgroundColor="#FF8983";
            Last.style.borderColor="#9E0900";
            }
        }
    };
    //Funcion que valida el titulo del nuevo usuario
    function ValidateTitle(){
         if(title.value===""){
            title.style.backgroundColor="white";
            title.style.borderColor="white";
        }
        else{
        if(Title.test(title.value)){
            title.style.backgroundColor="#9ACC7D";
            title.style.borderColor="#5F993E";
        }
        else{
           title.style.backgroundColor="#FF8983";
           title.style.borderColor="#9E0900";
         }
        }
    };
};
    
