<?php
    require_once('../sistema.class.php');
    class Invernadero extends Sistema{
        function create($data){
            $result=[];
            $this->conexion();
            $sql="INSERT INTO `invernadero`(`invernadero`, `latitud`, `longitud`, `area`, `fecha_creacion`)
             VALUES (:invernadero,:latitud,:longitud,:area,:fecha_creacion);";
            $insertar=$this->con->prepare($sql);
            $insertar->bindParam(':invernadero',$data['invernadero'],PDO::PARAM_STR);
            $insertar->bindParam(':latitud',$data['latitud'],PDO::PARAM_STR);
            $insertar->bindParam(':longitud',$data['longitud'],PDO::PARAM_STR);
            $insertar->bindParam(':area',$data['area'],PDO::PARAM_STR);
            $insertar->bindParam(':fecha_creacion',$data['fecha_creacion'],PDO::PARAM_STR);
            $insertar->execute();
            $resultado=$insertar->rowCount();
            return $resultado;
        }
        function update($id,$data){
            $this->conexion();
            $sql="Update invernadero set invernadero=:invernadero,
                latitud=:latitud, longitud=:longitud, area=:area, fecha_creacion=:fecha_creacion 
                where id_invernadero=:id_invernadero;";
            $modificar=$this->con->prepare($sql);
            $modificar->bindParam(':id_invernadero',$id,PDO::PARAM_INT);
            $modificar->bindParam(':invernadero',$data['invernadero'],PDO::PARAM_STR);
            $modificar->bindParam(':latitud',$data['latitud'],PDO::PARAM_STR);

            $modificar->bindParam(':longitud',$data['longitud'],PDO::PARAM_STR);
            $modificar->bindParam(':area',$data['area'],PDO::PARAM_STR);
            $modificar->bindParam(':fecha_creacion',$data['fecha_creacion'],PDO::PARAM_STR);
            $modificar->execute();
            $result=$modificar->rowCount();
            return $result;
        }
        function delete($id){
          
            $this->conexion();
            $sql="delete from invernadero where id_invernadero=:id_invernadero";
            $delete=$this->con->prepare($sql);
            $delete->bindParam(':id_invernadero',$id,PDO::PARAM_STR);
            $delete->execute();
            $resultado=$delete->rowCount();
            return $resultado;
        }
        function readOne($id):mixed{
            $this->conexion();
            $con="Select * from invernadero where id_invernadero=:id_invernadero";
            $sql=$this->con->prepare($con);
            $sql->bindParam('id_invernadero',$id,PDO::PARAM_INT);
            $sql->execute();
            $resultado=$sql->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
        function readAll(){
            $this->conexion();
            $result=[];
            $consulta='Select * from invernadero';
            $sql = $this->con->prepare($consulta);
            $sql -> execute();
            $result=  $sql ->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>