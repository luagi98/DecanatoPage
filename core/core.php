<?php
/*
  EL NÚCLEO DE LA APLICACIÓN!
*/

$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    session_regenerate_id(true);

    require('core/models/class.Conexion.php');
    require('core/bin/functions/Encrypt.php');

}else{
    //Sessions are not available
    echo 'sesion iniciada';


}


#Constantes de la APP
/*
define('HTML_DIR','html/');
define('APP_TITLE','OcrendBB');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . ' Ocrend Software.');
define('APP_URL','http://localhost/GitHub/OcrendBB/');
*/
#Estructura
/**/

//$users = Users();

?>
