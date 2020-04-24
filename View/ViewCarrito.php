<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div id="homeTitle" class="page-header">
                <h1>
                    <small>Carrito</small>
                    <a class="btn btn-primary btn-sm" href="?c=insertProducto" role="button">Insertar Producto</a>
                    <a class="btn btn-primary btn-sm" href="?c=loginUsuario" role="button">Log in babe</a>
                    <a class="btn btn-primary btn-sm" href="?c=insertCliente" role="button">Insertar Cliente</a>
                    <a class="btn btn-primary btn-sm" href="?c=signOut" role="button">Log Out Babe</a>
                    <a class="btn btn-primary btn-sm" href="?c=sendContactenos" role="button">Contactenos</a>
                    <br>
                </h1>
                <?php if (isset($_SESSION['carrito'])) { ?>
                     <?php $precioTotal = 0;?>
                     <?php foreach (unserialize($_SESSION['carrito']) as $values) { ?>
                         <div class="container-fluid-publicaciones">
                             <img class="align-self-center mr-3" src="<?php echo '' . $values['producto']->imagen . ''; ?>" height="200" width="200">
                             <h4><?php echo $values['producto']->nombre; ?></h4>
                             <h3><?php echo $values['producto']->precio; ?></h3>
                             <h3><?php echo $values['cantidad']; ?></h3>
                             <h3><?php echo number_format($values['cantidad'] * $values['producto']->precio, 2); ?></h3> 
                             <h3>TOTAL<?php echo $precioTotal = $precioTotal + ($values['cantidad'] * $values['producto']->precio); ?></h3>
                         </div>
                     <?php } ?>
                 <?php } else { ?>
                     <b>NEL</b>
                 <?php } ?>
                    </div>

        </div>
        <div class="col-md-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Product
                        </th>
                        <th>
                            Payment Taken
                        </th>
                        <th>
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            TB - Monthly
                        </td>
                        <td>
                            01/04/2012
                        </td>
                        <td>
                            Default
                        </td>
                    </tr>
                    <tr class="table-active">
                        <td>
                            1
                        </td>
                        <td>
                            TB - Monthly
                        </td>
                        <td>
                            01/04/2012
                        </td>
                        <td>
                            Approved
                        </td>
                    </tr>
                    <tr class="table-success">
                        <td>
                            2
                        </td>
                        <td>
                            TB - Monthly
                        </td>
                        <td>
                            02/04/2012
                        </td>
                        <td>
                            Declined
                        </td>
                    </tr>
                    <tr class="table-warning">
                        <td>
                            3
                        </td>
                        <td>
                            TB - Monthly
                        </td>
                        <td>
                            03/04/2012
                        </td>
                        <td>
                            Pending
                        </td>
                    </tr>
                    <tr class="table-danger">
                        <td>
                            4
                        </td>
                        <td>
                            TB - Monthly
                        </td>
                        <td>
                            04/04/2012
                        </td>
                        <td>
                            Call in to confirm
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>