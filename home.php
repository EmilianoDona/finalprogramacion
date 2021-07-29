<?php
  $page_title = 'Home ';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   /**page_require_level(1);
   page_require_level(2);
   page_require_level(3);*/
     if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php
 $userTotal       = count_by_id('users');
 $categoriesShop  = count_by_id('categories');
 $storeSales      = count_by_id('sales');
 $stockProduct    = count_by_id('products');
?>
<?php include_once('layouts/header.php'); ?>
</div>
<!--Cards-->
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h3 class="display-5" style="font-weight:bold; color: #707CFF;">Programation III</h3>
    <p class="lead">Internal Buying And Selling System</p>
  </div>
</div>
  <div class="row">
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #0074D9;">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $userTotal['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
        <a href="usuarios.php" class="btn" id="usuariosColor">Usuarios</a>
    </div>
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color:#FF851B">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $categoriesShop['total']; ?></h2>
          <p class="text-muted">Categoría Almacen</p>
        </div>
       </div>
        <a href="agregarCategoriaAlmacen.php" class="btn" id="heightSeven">Categoría Almacen</a>
    </div>
    <div class="col-md-3" id="margenArriba2">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #3D9970;">
          <i class="glyphicon glyphicon-indent-left"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $storeSales['total']; ?></h2>
          <p class="text-muted">Listado de Ventas</p>
        </div>
       </div>
       <a href="listado_ventas.php" class="btn" id="oneTwo">Listado de Ventas</a>
    </div>
    <div class="col-md-3" id="margenArriba2">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #2ECC40">
          <i class="glyphicon glyphicon-book"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $stockProduct['total']; ?> </h2>
          <p class="text-muted">Listado de Productos</p>
        </div>
       </div>
       <a href="stock.php" class="btn" id="fourFive">Listado de Productos</a>
    </div>

</div>
<!--/Cards-->











<?php include_once('layouts/footer.php'); ?>
