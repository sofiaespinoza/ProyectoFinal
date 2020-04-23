<form action="?c=insertCliente"   method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Nombre:</label>
        <input class="form-control" value=""
               type="text" name="nombre" placeholder="Escriba su nombre...">
    </div>

    <div class="form-group">
        <label for="email">Correo Electronico:</label>
        <input type="email" name="correo" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su correo...">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <textarea class="form-control" name="direccion" row ="8" id="Direccion"></textarea>
    </div>
    <input type="submit" class="btn btn-success" value="Enviar">
    <?php
     if (isset($cliente)) {
         echo '<input type="hidden"value="' . $cliente->getAttribute("idCliente") . '" name="idCliente">';
     }
    ?>
</form> 