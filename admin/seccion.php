<?php
require_once('seccion.class.php');
require_once('invernadero.class.php');
$appInvernadero=new Invernadero;
$app= new Seccion;
$app->checkRol('Administrador');
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
switch($accion){
    case 'crear':
        $invernaderos=$appInvernadero->readAll();
        include('views/seccion/crear.php');
        break;
    case 'nuevo':
        $data=$_POST['data'];
        $resultado=$app->create($data);
        if($resultado){
            $mensaje="La sección se ha dado de alta existosamente";
            $tipo="success";
        }else{
            $mensaje="Ocurrio un error al dar de alta la sección";
            $tipo="danger";
        }
        $secciones=$app->readAll();
        include('views/seccion/index.php');
        break;
    case 'actualizar':
        $invernaderos=$appInvernadero->readAll();
        $id=(isset($_GET['id']))?$_GET['id']:null;
        $secciones=$app->readOne($id);
        include('views/seccion/crear.php');
        break;
    case 'modificar':
        $data=$_POST['data'];
        $id=(isset($_GET['id']))?$_GET['id']:null;
        $resultado=$app->update($id,$data);
        if($resultado){
            $mensaje="La sección se ha  altualizo existosamente";
            $tipo="success";
        }else{
            $mensaje="Ocurrio un error al actualizar  de alta la sección";
            $tipo="danger";
        }
        $secciones=$app->readAll();
        include('views/seccion/index.php');
        break;
    case 'eliminar':
        
        $id=(isset($_GET['id']))?$_GET['id']:null;
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se ha eliminado la sección correctamente";
                    $tipo="success";
                }else{
                    $mensaje="Error al eliminar la sección";
                    $tipo="danger";
                }
            }
        }
        $secciones=$app->readAll();
        include 'views/seccion/index.php';
        break;
    default:
        $secciones=$app->readAll();
        include 'views/seccion/index.php';
}
require_once('views/footer.php');
?>