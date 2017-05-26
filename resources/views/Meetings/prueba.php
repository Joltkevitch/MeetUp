<?php 

mail("alejandro.ja@hotmail.es,Alejandro.Joltkevich@redeemgroup.com","My subject","Hola mundo");
if(mail("alejandro.ja@hotmail.es","My subject","Hola mundo")){
    error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
    echo "si";
}
else{
        error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
    echo "no";
}
?> 