<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <img src="img/Logo1.jpg" alt=""/>
  <a class="navbar-brand" href="?c=getHome">Valeria's Store</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="?c=getProducto">Productos<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="?c=ViewCarrito">Carrito_Compra</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?c=sendContactenos">Contactenos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?c=sendSoporte">Soporte</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="?c=buscarProducto" method="POST">
      <input class="form-control mr-sm-2" name="buscador" type="search" placeholder="Búsqueda Producto" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
