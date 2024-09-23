<?php
include('config.class.php');
class sistema {
    var $con;
    function conexion(){
        // Aquí se establece la conexión a la base de datos
        $this -> con = new PDO(SGBD.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT, DBUSER, DBPASS); //EL PUNTO SIRVE PARA CONCATENAR        
//Si hay algún error durante la conexión, lo maneja este bloque

    }
}

?>