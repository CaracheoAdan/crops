<?php require('views/header.php')  ?>
<h3>Nuevo Invernadero</h3>
<form method="post" action="invernadero.php?accion=nuevo">  
    <div class="mb-3">
      <label for="invernadero" class="form-label">Nombre del invernadero</label>
      <input class="form-control" type="text" name="data[invernadero]" placeholder="Escribe aqui el nombre" id="invernadero"/>
    </div>

    <div class="mb-3">
        <label for="invernadero" class="form-label">Latitud del invernadero  del invernadero</label>
        <input class="form-control" type="text" name="data[latitud]" placeholder="Escribe aqui la longitud"  id="latitud"/> 
    </div>

    <div class="mb-3">
        <label for="invernadero" class="form-label">Longitud del invernadero</label>
        <input class="form-control" type="text" name="data[longitud]" placeholder="Escribe aqui la latitud"  id="longitud"/> 
    </div>

    <div class="mb-3">
        <label for="invernadero" class="form-label">Area del invernadero (m<sup>2</sup>)</label>
        <input class="form-control" type="number" name="data[area]" placeholder="Escribe aqui el area"  id="area"/> 
    </div>

    <div class="mb-3">
        <label for="invernadero" class="form-label">Fecha del invernadero</label>
        <input class="form-control" type="date" name="data[fecha]" placeholder="Escribe aqui la fecha"  id="fecha"/>
    </div>

    <input type="submit" value="Guardar" name="data[enviar]" class="btn btn-primary w-100"  id="invernadero"/> 

</form>
<?php require('views/footer.php')  ?>