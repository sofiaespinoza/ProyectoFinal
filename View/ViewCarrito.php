<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div id="homeTitle" class="page-header">
                <h1>
                    <small>Carrito</small>
                    <a class="btn btn-primary btn-sm" href="?c=insertProducto" role="button">Insertar Producto</a>
                    <a class="btn btn-primary btn-sm" href="?c=loginUsuario" role="button">LOG IN</a>
                    <a class="btn btn-primary btn-sm" href="?c=insertCliente" role="button">Insertar Cliente</a>
                    <a class="btn btn-primary btn-sm" href="?c=signOut" role="button">Log OUT</a>
                    <a class="btn btn-primary btn-sm" href="?c=sendContactenos" role="button">Contactenos</a>
                    <a class="btn btn-primary btn-sm" href="?c=carrito" role="button">Carrito</a>
                    <a class="btn btn-primary btn-sm" href="?c=deleteCarrito" role="button">Borrar Carrito</a>
                    <br>
                </h1>
            </div>
            <ul class="list-group">
                <?php if (isset($_SESSION['carrito'])) { ?>
                    <?php $precioTotal = 0; ?>
                    <?php foreach (unserialize($_SESSION['carrito']) as $values) { ?>
                      <li class="list-group-item"><div class="container-fluid-publicaciones">
                              <div class="media">
                                  <img class="align-self-center mr-3" src="<?php echo '' . $values['producto']->imagen . ''; ?>" height="200" width="200">
                                  <div class="media-body">
                                      <h4><?php echo $values['producto']->nombre; ?></h4>
                                      <h3><?php echo $values['producto']->precio; ?></h3>
                                      <h3><?php echo $values['cantidad']; ?></h3>
                                      <a class="btn btn-outline-danger" role="button" href="?c=deleteItem&id=<?php echo $values['producto']->getAttribute("idProducto"); ?>">Eliminar</a>

                                  </div>
                              </div>
                          </div> </li>
                      <h3>TOTAL <?php echo $precioTotal = $precioTotal + ($values['cantidad'] * $values['producto']->precio); ?></h3>
                    <?php } ?>

                    <a class="btn btn-outline-danger" role="button" href="?c=insertCliente&total=<?php echo $precioTotal; ?>">PAGAR</a>
                  <?php } else { ?>
                    <b>NEL</b>
                  <?php } ?>

            </ul>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>