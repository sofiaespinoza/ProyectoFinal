<body>
    <div class="container-fluid">
        <div class="row">
            <div id="homeColL" class="col-md-3"></div>
            <div id="CommentPost" class="col-md-6">
                <form class="form-inline my-2 my-lg-0" action="?c=buscarProducto" method="POST">
                    <input class="form-control mr-sm-2" name="buscador" type="search" placeholder="Búsqueda" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                <div id="homeTitle" class="page-header">
                    <h1>
                        <small>Productos</small>
                        <a class="btn btn-primary btn-sm" href="?c=insertProducto" role="button">Insertar Producto</a>
                        <a class="btn btn-primary btn-sm" href="?c=loginUsuario" role="button">LOG</a>
                        <a class="btn btn-primary btn-sm" href="?c=insertCliente" role="button">Insertar Cliente</a>
                        <a class="btn btn-primary btn-sm" href="?c=signOut" role="button">OUT</a>
                        <a class="btn btn-primary btn-sm" href="?c=sendContactenos" role="button">Contactenos</a>
                        <a class="btn btn-primary btn-sm" href="?c=deleteCarrito" role="button">Borrar Carrito</a>
                        <br>
                    </h1>

                </div>
                <?php if (count($listaProductos)) { ?>
                    <?php foreach ($listaProductos as $producto) { ?>
                      <div class="container-fluid-publicaciones">
                          <img class="align-self-center mr-3" src="<?php echo '' . $producto->imagen . ''; ?>" alt="Generic placeholder image" height="200" width="200">
                          <h4><?php echo $producto->nombre; ?></h4>
                          <h3><?php echo $producto->precio; ?></h3>
                          <form name="form" action="?c=getProducto" method="POST">
                              <input type="hidden" name="idProducto" id="idProducto" value="<?php echo '' . $producto->getAttribute("idProducto") . ''; ?>">
                              <div class="form-group col-md-2">
                                  <label for="cantidad">Cantidad</label>
                                  <input type="text" class="form-control" name="cantidad" value="1">
                              </div>
                              <a class="btn btn-outline-warning" role="button" href="?c=carrito&id=<?php echo $producto->getAttribute("idProducto"); ?>">Agregar</a>


                          </form>
                      </div>
                    <?php } ?>
                  <?php } else { ?>
                    <b>Sin productos...</b>
                  <?php } ?>

            </div>
            <div id="homeColR" class="col-md-3"></div>
        </div>
    </div>
</body>
