<?php
 include ('../sistema.class.php');

 class Invernadero extends sistema {

    function create ($data){
        $result =[];
        print_r($data);
        die();
        return $result;
    }

    function update ($idl, $data){
        $result = [];
        return $result;
    }

    function delete ($id){
        $result = [];
        return $result;
    }

    function readOne ($id){
        $result = [];
        return $result;
    }

    function readAll (){
        $this ->conexion();
        $result = [];
        $consulta ='select * from invernadero';
        $sql = $this->con->prepare ($consulta); 
        $sql->execute();
        $result = $sql->fetchALL(PDO::FETCH_ASSOC);    
        return $result;
    }
 }

?>