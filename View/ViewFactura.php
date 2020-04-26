<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <?php if (!empty($_SESSION['cliente'])) { ?>
                <?php $cliente = unserialize($_SESSION['cliente']); ?>
                <h3><?php echo '' . $cliente->nombre . ''; ?> </h3><br><br>
                <blockquote class="blockquote">
                    <p class="mb-0"><?php echo 'Su pedido será entregado en: ' . $cliente->direccion . ''; ?></p><br><br>
                    <p class="mb-0"><cite> <?php echo 'Correo electrónico: ' . $cliente->correo . ''; ?> </cite></p>
                </blockquote>
              <?php } ?>
        </div>
        <div class="col-md-4">                     
            <table class="table">
                <thead>
                    <tr>
                        <th> Cantidad</th>
                        <th>Producto</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $total = unserialize($_SESSION['total']);
                      $carrito = unserialize($_SESSION['carrito']);
                      if (isset($_SESSION['carrito'])) {
                        foreach (unserialize($_SESSION['carrito']) as $values) {
                          ?>
                          <tr>
                              <td>
                                  <?php echo $values['cantidad']; ?>
                              </td>
                              <td>
                                  <?php echo $values['producto']->nombre; ?>
                              </td>
                              <td>
                                  <?php echo $values['producto']->precio; ?>
                              </td>
                          </tr>
                        <?php } ?>
                      <?php } ?>
                    <tr class="table-danger">
                        <td></td>
                        <td>Total:</td>
                        <td><?php echo $total; ?></td>

                    </tr>
                </tbody>
            </table> 
            <button type="button" class="btn btn-success btn-block">
                Button
            </button>
        </div>
        <div class="col-md-2">
        </div>
    </div>
</div>