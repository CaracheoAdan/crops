<?php
require_once('invernadero.class.php');
$app= new Invernadero;
$app->checkRol('Administrador');
/*$app->conexion();
print_r($app);
$result=$app->readAll();
print_r($result);*/
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
//print_r($accion);
switch($accion){
    case 'crear':
        include('views/invernadero/crear.php');
        break;
    case 'nuevo':
        $data=$_POST['data'];
        $resultado=$app->create($data);
        if($resultado){
            $mensaje="EL invernadero se ha dado de alta existosamente";
            $tipo="success";
        }else{
            $mensaje="Ocurrio un error al dar de alta el invernadero";
            $tipo="danger";
        }
        $invernaderos=$app->readAll();
        include('views/invernadero/index.php');
        break;
    case 'actualizar':
        $id=(isset($_GET['id']))?$_GET['id']:null;
        $invernaderos=$app->readOne($id);
        include('views/invernadero/crear.php');
        break;
    case 'modificar':
        $data=$_POST['data'];
        $id=(isset($_GET['id']))?$_GET['id']:null;
        $resultado=$app->update($id,$data);
        if($resultado){
            $mensaje="EL invernadero se ha  altualizo existosamente";
            $tipo="success";
        }else{
            $mensaje="Ocurrio un error al actualizar  de alta el invernadero";
            $tipo="danger";
        }
        $invernaderos=$app->readAll();
        include('views/invernadero/index.php');
        break;
    case 'eliminar':
        
        $id=(isset($_GET['id']))?$_GET['id']:null;
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se ha eliminado el invernadero correctamente";
                    $tipo="success";
                }else{
                    $mensaje="Error al eliminar el invernadero";
                    $tipo="danger";
                }
            }
        }
        $invernaderos=$app->readAll();
        include 'views/invernadero/index.php';
        break;
    default:
        $invernaderos=$app->readAll();
        include 'views/invernadero/index.php';
}
require_once('views/footer.php');
?>