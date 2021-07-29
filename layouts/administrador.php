<?php
  require_once('header.php');
?>
<style>
#imagen{
  height:50px;
  width:50px
}
#perfil{
  color: white;
}
</style>

<div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-header">
              <div class="user-pic">
              <a href="" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <i class="glyphicon glyphicon-user" style="font-size:30px;"></i>
            </a>
              </div>
              <div class="user-info">
                <span class="user-name"><?php echo remove_junk(ucfirst($user['name'])); ?>
                </span>
                <span class="user-role">
                <a href="perfil.php?id=<?php echo (int)$user['id'];?>" title="Ver Perfil" id="perfil">
                  Rol: Admin
                  </a>
                </span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
                </span>
              </div>
            </div>

            <div class="sidebar-menu">
              <ul>
                <!-- Home Inicio -->
                <li class="sidebar-dropdown" >
                  <a href="home.php" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Dashboard</span>
                  </a>
                </li>
                <!-- home fin -->
                <!-- Usuario Inicio -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Usuarios</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="grupos.php">Administrar Grupos</a>
                      </li>
                      <li>
                        <a href="usuarios.php">Administrar Usuarios</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Usuarios Fin -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-arrow-right" ></i>
                    <span style="font-size:12px;">Productos</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="agregarCategoriaAlmacen.php">Categorias Almacen</a>
                      </li>
                      <li>
                        <a href="agregar_stock.php" >Agregar Producto</a>
                      </li>
                      <li>
                        <a href="stock.php" >Listado Productos</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-arrow-right" ></i>
                    <span>Ventas</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="listado_ventas.php" >Listado de Ventas</a>
                      </li>
                      <li>
                        <a href="agregar_venta.php" >Agregar Venta</a>
                      </li>
                      <li>
                        <a href="ventas_diarias.php" >Ventas Diarias</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->
          <div class="sidebar-footer" >
            <a href="agregar_usuario.php" title="Agregar Usuario"  style="margin-top:12px;">
              <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="editar_cuenta.php" title="Editar Cuenta" style="margin-top:12px;">
              <i class="glyphicon glyphicon-cog"></i>
            </a>
            <a href="logout.php" title="Salir" style="margin-top:12px;">
              <i class="glyphicon glyphicon-off"></i>
            </a>
          </div>
        </nav>
        <!-- sidebar-wrapper  -->
      </div>
  </li>
</ul>


      <script>
      $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


      </script>
