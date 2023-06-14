
<div class="menu">
  <div class="logo">
    <a href="../php/dashboard.php">APROIL INVENTORY</a>
  </div>
  <nav>
    <ul class="menu_horizontal">
      <li>
        <a href="#">Productos</a>
        <ul class="menu_vertical">
          <li><a href="../html/registrarProducto.php">Registrar producto</a></li>
          <li><a href="../html/eliminarProducto.php">Eliminar producto</a></li>
          <li><a href="#">Modificar producto</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Clientes</a>
        <ul class="menu_vertical">
          <li><a href="../html/registrarCliente.php">Registrar cliente</a></li>
          <li><a href="#">Eliminar cliente</a></li>
          <li><a href="#">Modificar cliente</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Proveedores</a>
        <ul class="menu_vertical">
          <li><a href="../html/registrarProveedor.php">Registrar proveedor</a></li>
          <li><a href="#">Eliminar proveedor</a></li>
          <li><a href="#">Modificar proveedor</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Inventarios</a>
        <ul class="menu_vertical">
          <li><a href="#">Consultar por producto</a></li>
          <li><a href="#">Consultar lotes</a></li>
        </ul>
      </li>
      <li><a href="#">Reportes</a></li>
      <li><a href="#">Salir</a></li>
    </ul>
  </nav>
</div>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  .menu {
    background: #333;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .logo {
    background-color: #500000;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .logo a {
    text-decoration: none;
    font-size: 30px;
    color: white;
    font-weight: 800;
    padding: 20px 0 20px 0;
  }
  nav {
    margin: auto;
    background-color: #333;
    font-size: 20px;
  }

  .menu_horizontal {
    list-style: none;
    display: flex;
    justify-content: space-around;
  }

  .menu_horizontal > li >a {
    display: block;
    padding: 15px 20px;
    color: white;
    text-decoration: none;
  }

  .menu_horizontal > li:hover {
    background-color: #af0505;
  }

  .menu_vertical {
    position: absolute;
    display: none;
    list-style: none;
    width: 200px;
    background-color: rgba(0, 0, 0, .5);
  }

  .menu_horizontal li:hover .menu_vertical {
    display: block;
  }

  .menu_vertical li:hover {
    background-color: #ff2626;
  }

  .menu_vertical li a {
    display: block;
    color: white;
    padding: 15px 15px 15px 20px;
    text-decoration: none;
  }
</style>