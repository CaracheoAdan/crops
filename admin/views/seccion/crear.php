<?php require('views/header/header_administrador.php');?>
<h1><?php if($accion=="crear"): echo "Nuevo";  else: echo "Modificar"; endif;?> seccion  </h1>
<form method="post" action="seccion.php?accion=<?php if($accion=="crear"):echo("nuevo"); else:echo("modificar&id=".$id); endif;?>">
    
        <div class="mb-3">
            <label  class="form-label" >Nombre de seccion</label>
            <input  class="form-control"  type="text" name="data[seccion]" placeholder="Escribe aquí el nombre" 
            value=<?php if(isset($secciones['seccion'])):echo $secciones['seccion']; endif; ?> >
        </div>
        <div class="mb-3">
            <label class="form-label" >Area seccion</label>
            <input class="form-control" type="text" name="data[area]" placeholder="Escribe aquí la area"  
            value=<?php if(isset($secciones['area'])):echo $secciones['area']; endif;  ?>  >
        </div>
        <div class="mb-3">
            <label class="form-label" >Invernadero</label>
            <select name="data[id_invernadero]" class="form-select" aria-label="Default select example">
                <?php foreach($invernaderos as $invernadero):?>
                    <?php
                        $selected="";
                        if($secciones['id_invernadero']==$invernadero['id_invernadero'])
                            $selected="selected";
                    ?>
                    <option value="<?php  echo ($invernadero['id_invernadero']);?>"  <?php echo $selected?> >
                        <?php  echo ($invernadero['invernadero']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="submit" name="date[enviar]" value="Guardar"  class="btn btn-primary"/>
        
</form>
<?php require('views/footer.php')?>