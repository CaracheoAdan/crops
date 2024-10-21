<?php require('views/header/header_administrador.php');?>
<h1><?php if($accion=="crear"): echo "Nuevo";  else: echo "Modificar"; endif;?> Invernadero </h1>
<form method="post" action="invernadero.php?accion=<?php if($accion=="crear"):echo("nuevo"); else:echo("modificar&id=".$id); endif;?>">
    
        <div class="mb-3">
            <label  class="form-label" >Nombre de invernadero</label>
            <input  class="form-control"  type="text" name="data[invernadero]" placeholder="Escribe aquí el nombre" 
            value=<?php if(isset($invernaderos['invernadero'])):echo $invernaderos['invernadero']; endif; ?> />
        </div>
        <div class="mb-3">
            <label class="form-label" >Latitud de invernadero</label>
            <input class="form-control" type="text" name="data[latitud]" placeholder="Escribe aquí la latitud"  
            value=<?php if(isset($invernaderos['latitud'])):echo $invernaderos['latitud']; endif;  ?>  />
        </div>
        <div class="mb-3">
            <label class="form-label" >Longitud del invernadero</label>
            <input class="form-control" type="text" name="data[longitud]" placeholder="Escribe aquí la longitud"
             value=<?php if(isset($invernaderos['longitud'])):echo $invernaderos['longitud']; endif;?> />
        </div>
        <div class="mb-3">
            <label class="form-label" >Area de invernadero (m<sup>2</sup>)</label>
            <input class="form-control" type="number" name="data[area]" placeholder="Escribe aquí el área "
             value=<?php if(isset($invernaderos['area'])):echo $invernaderos['area'] ; endif; ?> />
        </div>
        <div class="mb-3">
            <label class="form-label" >Escribe la fecha de creacion</label>
            <input class="form-control" type="date" name="data[fecha_creacion]" placeholder="Escribe aquí la fecha de creacion " 
            value=<?php if(isset($invernaderos['fecha_creacion'])):echo $invernaderos['fecha_creacion']; endif;?> />
        </div>
        <input type="submit" name="date[enviar]" value="Guardar"  class="btn btn-primary"/>
        
</form>
<?php require('views/footer.php')?>