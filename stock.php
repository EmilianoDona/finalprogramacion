<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Listado Stock';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">

      <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="agregar_stock.php" class="btn btn-primary">Agregar Producto</a>
         </div>

        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Listado Stock</span>
         </strong>
        </div>
      </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;"> # </th>
                <th style="width: 30%;"> Nombre Producto </th>
                <th class="text-center" style="width: 10%;"> Marca </th>
                <th class="text-center" style="width: 10%;"> Categoría </th>
                <th class="text-center" style="width: 5%;"> Fecha Vencimiento </th>
                <th class="text-center" style="width: 10%;"> Cantidad Stock </th>
                <th class="text-center" style="width: 10%;"> Precio Compra </th>
                <th class="text-center" style="width: 10%;"> Precio Venta </th>
                <th class="text-center" style="width: 15%;"> Acciones </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['titulo']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['existencia']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="editarStock.php?id=<?php echo (int)$product['id'];?>" class="btn btn-warning btn-xl"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_stock.php?id=<?php echo (int)$product['id'];?>'
                        }})"><span class="glyphicon glyphicon-trash"></span></a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>


<!--Confirm-->

<script src="libs/js/jBox.all.js"></script>
<script src="libs/js/demo.js"></script>

<!--/Confirm-->
