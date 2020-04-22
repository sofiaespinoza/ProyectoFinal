<form action="<?php echo (isset($nuevoUsuario)) ? "?c=updatePost" : "?c=insertUsuario" ?>"   method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Nombre:</label>
        <input class="form-control" value="<?php echo (isset($nuevoUsuario)) ? $nuevoUsuario->nombre : "" ?>" 
               type="text" name="Nombre" placeholder="Escriba su nombre...">
    </div>
    <div class="form-group">
        <label for="title">Telefono:</label>
        <input class="form-control" value="<?php echo (isset($nuevoUsuario)) ? $nuevoUsuario->telefono : "" ?>" 
               type="text" name="Telefono" placeholder="+(506)8888-8888">
    </div>
    <div class="form-group">
        <label>Dirección</label>
        <textarea class="form-control" name="Direccion" row ="8" id="Direccion">
            <?php echo (isset($nuevoUsuario)) ? $nuevoUsuario->direccion : ""; ?></textarea>
    </div>
    <div class="form-group">
        <label for="email">Correo Electronico:</label>
        <input type="email" name="Correo" value="<?php echo (isset($nuevoUsuario)) ? $nuevoUsuario->correo : "" ?>" 
               class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escriba su correo...">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="contrasena">Contraseña: </label>
        <input type="password" name= "Contrasena" value="<?php echo (isset($nuevoUsuario)) ? $nuevoUsuario->getAttribute("contrasena") : "" ?>" 
               class="form-control" id="exampleInputPassword1" placeholder="Contraseña">
    </div>
    <input type="submit" class="btn btn-success" value="Enviar">
    <?php
     if (isset($nuevoUsuario)) {
         echo '<input type="hidden"value="' . $nuevoUsuario->getAttribute("idUsuario") . '" name="idUsuario">';
     }
    ?>
</form> 