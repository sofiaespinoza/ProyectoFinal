<div class="col-md-6">
    <div id="homeTitle" class="page-header">
        <h1 class="title"><?php echo (isset($nuevoProducto)) ? "Modificar Producto" : "Insertar Producto"; ?></h1>
    </div>

    <form action="<?php echo (isset($nuevoProducto)) ? "?c=updateProducto" : "?c=insertProducto" ?>"   method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Nombre del producto</label>
            <input class="form-control" value="<?php echo (isset($nuevoProducto)) ? $nuevoProducto->nombre : "" ?>" 
                   type="text" name="Nombre" placeholder="Escriba nombre">
        </div>
        <div class="form-group">
            <label>Detalle del producto</label>
            <textarea class="form-control" name="Detalle" row ="8" id="detalle">
                <?php echo (isset($nuevoProducto)) ? $nuevoProducto->detalle : ""; ?></textarea>
        </div>
        <div class="form-group">
            <label for="title">Precio unitario:</label>
            <input class="form-control" value="<?php echo (isset($nuevoProducto)) ? $nuevoProducto->precio : "" ?>" 
                   type="text" name="Precio" placeholder="Escriba nombre">
        </div>
        <div class="form-group">
            <label for="title">Añadir Imagen</label>
            <input  name="Imagen" id="Imagen" value="<?php echo (isset($nuevoProducto)) ? '<img src="img/ ' . $row['Imagen'] . ' " ' : "" ?>" 
                    type="file">
        </div>
        <input type="submit" class="btn btn-success" value="Enviar">
        <?php
         if (isset($nuevoProducto)) {
             echo '<input type="hidden"value="' . $nuevoProducto->getAttribute("idProducto") . '" name="idProducto">';
         }
        ?>
    </form> 

</div>