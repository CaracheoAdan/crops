<?php
session_start();
require_once('config.class.php');
class Sistema{
    var $con;
    function conexion(){
      
        $this->con = new PDO(SGBD.':host='.DBHOST.';dbname='.DBNAME.';port='.DBPORT, DBUSSER , DBPASS);
        return $this->con;
    }
    function alerta($tipo,$mensaje){
        include('views/alert.php');
    }
    function getRol($correo){
        $this->conexion();
        $data=[];
        
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $sql="SELECT r.rol as rol FROM usuario u 
                join usuario_rol ur on u.id_usuario=ur.id_usuario 
                join rol r on r.id_rol=ur.id_rol
                where correo=:correo;";
            $roles=$this->con->prepare($sql);
            $roles->bindParam(':correo',$correo,PDO::PARAM_STR);
            $roles->execute();
            $data=$roles->fetchAll(PDO::FETCH_ASSOC);
            $roles= [];
            foreach($data as $rol){
                array_push($roles,$rol['rol']);
            }
            $data = $roles; 

        }   
        
        return $roles;
    }
    function getPrivilegios($correo){
        $this->conexion();
        $data=[];
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $sql="select p.permiso as permiso from usuario u 
                    join usuario_rol ur on u.id_usuario=ur.id_usuario
                    join rol r on r.id_rol=ur.id_rol
                    join rol_permiso rp on rp.id_rol=ur.id_rol 
                    join permiso p on p.id_permiso=rp.id_permiso
                    where correo=:correo;";
            $privelegio=$this->con->prepare($sql);
            $privelegio->bindParam(':correo',$correo,PDO::PARAM_STR);
            $privelegio->execute();
            $data=$privelegio->fetchAll(PDO::FETCH_ASSOC);
            $privelegios= [];
            foreach($data as $privelegio){
                array_push($privelegios,$privelegio['permiso']);
            }
            $data = $privelegios; 

        }
        return $data;
    }
    function login($correo, $contrasena){
        $contrasena = md5($contrasena);
        $resultado=[];
        $acceso=false;
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $this->conexion();
            $sql="Select * from usuario 
                    where correo=:correo 
                    and contrasena=:contrasena";
            $operacion=$this->con->prepare($sql);
            $operacion->bindParam('correo',$correo,PDO::PARAM_STR);
            $operacion->bindParam('contrasena',$contrasena,PDO::PARAM_STR);
            $operacion->execute();
            $resultado=$operacion->fetchAll(PDO::FETCH_ASSOC);
            if(isset($resultado[0])){
                $acceso=true;
                $_SESSION['correo']=$correo;
                $_SESSION['validado']= $acceso;
                $roles =$this->getRol($correo);
                $privilegios=$this->getPrivilegios($correo);
                $_SESSION['roles']=$roles;
                $_SESSION['privilegios']=$privilegios;
                return $acceso;
            }
        }
        $_SESSION['validado']= $acceso;
        return $acceso;

    }
    function logout(){
        unset($_SESSION);
        session_destroy();
        $mensaje="Gracias por utilizar el Sistema, 
            se ha cerrado la sesión <a href='login.php'>[presione aqui para volver entrar]</a>";
        $tipo="success";
        require_once('views/header.php');
        $this->alerta($tipo,$mensaje);
        require_once('views/footer.php');
    }
    function checkRol($rol){
        if(isset($_SESSION['roles'])){
            $roles=$_SESSION['roles'];
            if(!in_array($rol,$roles)){

                $mensaje="Error usted no tiene el rol adecuado";
                $tipo="danger";
                require_once('views/header/alert.php');
                $this->alerta($tipo,$mensaje);

                die();
            }
        }else{
            $mensaje="Requiere iniciar sesión 
                <a href='login.php'>[Quiere iniciar sesión]</a>";
            $tipo="danger";
            require_once('views/header/alert.php');
            $this->alerta($tipo,$mensaje);
            die();
        }
    }

}
?>