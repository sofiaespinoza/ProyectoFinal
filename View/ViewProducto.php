<body>
    <div class="container-fluid">
        <div class="row">
            <div id="homeColL" class="col-md-3"></div>
            <div id="CommentPost" class="col-md-6">
                <div id="homeTitle" class="page-header">
                    <h1>
                        <small>Productos</small>
                        <br>
                    </h1>
                </div>
                <?php if (count($listaProductos)) { ?>
                     <?php foreach ($listaProductos as $producto) { ?>
                         <div class="container-fluid-publicaciones">
                             <h4><?php echo $producto->nombre; ?></h4>
                             <p> <?php echo substr($producto->detalle, 0, 100); ?>...</p>
                             <h3><?php echo $producto->precio; ?></h3>
                             <form name="form" action="?c=getProducto" method="POST">
                                 <input type="hidden" name="idProducto" id="id" value="<?php echo '' . $producto->getAttribute("idProducto") . ''; ?>">
                                 <input class="btn btn-outline-primary" type="submit" value="Ver más »">
                                 <a class="btn btn-outline-warning" role="button" href="?c=updatePost&id=<?php echo $producto->getAttribute("idProducto"); ?>">Editar</a>
                             </form>
                         </div>
                     <?php } ?>
                 <?php } else { ?>
                     <b>Sin productos...</b>
                 <?php } ?>
                <a class="btn btn-primary" href="?c=insertProducto" role="button">Insertar</a>
            </div>
            <div id="homeColR" class="col-md-3"></div>
        </div>
    </div>
</body>
