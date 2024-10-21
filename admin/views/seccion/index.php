<?php require('views/header/header_administrador.php') ?>  
    <h1>Secciones</h1>
    <?php if(isset($mensaje)):$app->alerta($tipo,$mensaje);endif; ?>
    <a href="seccion.php?accion=crear" class="btn btn-success">Nuevo seccion</a>
     
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Área</th>
        <th scope="col">Sección</th>
        <th scope="col">Invernadero</th>
        <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($secciones as $seccion): ?>
        <tr>
          <th scope="row"><?php echo $seccion['id'];?></th>
          <td><?php echo $seccion['area'];?></td>
          <td><?php echo $seccion['seccion'];?></td>
          <td><?php echo $seccion['invernadero'];?></td>
          
          <td>
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <a href="seccion.php?accion=actualizar&id=<?php echo $seccion['id'];?>" class="btn btn-warning">Actualizar</a>
              <a href="seccion.php?accion=eliminar&id=<?php echo $seccion['id'];?>" class="btn btn-danger">Eliminar</a>
          
            </div>
          <td>
        </tr>
        <?php endforeach ?>
    </tbody>
    </table>

<?php require('views/footer.php')?>