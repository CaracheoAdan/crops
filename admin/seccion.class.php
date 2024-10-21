<?php
    require_once('../sistema.class.php');
    class Seccion extends Sistema{
        function create($data){
            $result=[];
            $this->conexion();
            $sql="INSERT INTO `seccion`(area,id_invernadero,seccion)
             VALUES (:area,:id_invernadero,:seccion);";
            $insertar=$this->con->prepare($sql);
            $insertar->bindParam(':area',$data['area'],PDO::PARAM_INT);
            $insertar->bindParam(':id_invernadero',$data['id_invernadero'],PDO::PARAM_INT);
            $insertar->bindParam(':seccion',$data['seccion'],PDO::PARAM_STR);
            $insertar->execute();
            $resultado=$insertar->rowCount();
            return $resultado;
        }
        function update($id,$data){
            $this->conexion();
            $sql="Update seccion set area=:area,
                id_invernadero=:id_invernadero, seccion=:seccion,
                        id_invernadero=:id_invernadero
                       where id=:id;";
            $modificar=$this->con->prepare($sql);
            $modificar->bindParam(':area',$data['area'],PDO::PARAM_INT);
            $modificar->bindParam(':seccion',$data['seccion'],PDO::PARAM_STR);
            $modificar->bindParam(':id_invernadero',$data['id_invernadero'],PDO::PARAM_INT);
            $modificar->bindParam(':id',$id,PDO::PARAM_INT);
            $modificar->execute();
            $result=$modificar->rowCount();
            return $result;
        }
        function delete($id){
          
            $this->conexion();
            if(is_numeric($id)){
                $sql="delete from seccion where id=:id";
                $delete=$this->con->prepare($sql);
                $delete->bindParam(':id',$id,PDO::PARAM_INT);
                $delete->execute();
                $resultado=$delete->rowCount();
                return $resultado;
            }
            return $resultado;
        }
        function readOne($id):mixed{
            $this->conexion();
            $con="Select * from seccion where id=:id";
            $sql=$this->con->prepare($con);
            $sql->bindParam('id',$id,PDO::PARAM_INT);
            $sql->execute();
            $resultado=$sql->fetch(PDO::FETCH_ASSOC);
            return $resultado;
        }
        function readAll(){
            $this->conexion();
            $result=[];
            $consulta='Select s.*,i.invernadero from seccion s join invernadero i 
                on s.id_invernadero=i.id_invernadero';
            $sql = $this->con->prepare($consulta);
            $sql -> execute();
            $result=  $sql ->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>