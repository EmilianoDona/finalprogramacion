<!--Nuevo-->
<?php
  $page_title = 'Editar Stock';
  require_once('includes/load.php');
   page_require_level(1);
?>
<?php
$product = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');

?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity');
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_titulo = remove_junk($db->escape($_POST['product-titulo']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));

       $p_existencia = remove_junk($db-> escape($_POST['product-existencia']));

       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}',titulo='{$p_titulo}',quantity ='{$p_qty}',";
       $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}',categorie_id ='{$p_cat}',existencia='$p_existencia'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"PRODUCTO ACTUALIZADO EXITOSAMENTE");
                 redirect('stock.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('stock.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('stock.php?id='.$product['id'], false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Stock</span>
         </strong>
        </div>
        <div class="panel-body">
          <div class="form-group">
          <div class="row">
          <div class="col-md-3">
          <form method="post" action="editarStock.php?id=<?php echo (int)$product['id'] ?>">
          <ul class="list-group" >
          <li class="list-group-item active" >
          <div><i class="glyphicon glyphicon-user fa-2x"></i><p class="editProducts">&nbsp;Nombre Producto</p></div>
          </li>
          <input type="text" class="form-control" name="product-title" value="<?php echo remove_junk($product['name']);?>">
          </ul>
          </div>
          <div class="col-md-3">
          <ul class="list-group" >
          <li class="list-group-item active" >
          <div><i class="glyphicon glyphicon-list-alt fa-2x"></i><p class="editProducts">&nbsp;Marca</p></div>
          </li>
          <input type="text" class="form-control" name="product-titulo" value="<?php echo remove_junk($product['titulo']);?>">
          </ul>
          </div>
          <div class="col-md-3">
          <ul class="list-group">
          <li class="list-group-item active">
          <div><i class="glyphicon glyphicon-list-alt fa-2x"></i><p class="editProducts">&nbsp;Seleccione Categoría</p></div>
          </li>
          <select class="form-control" name="product-categorie">
          <option value="">Selecciona Categoría:</option>
          <?php  foreach ($all_categories as $cat): ?>
          <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
          <?php echo remove_junk($cat['name']); ?></option>
          <?php endforeach; ?>
          </select>
          </ul>
          </div>
          <div class="col-md-3">
          <ul class="list-group" >
          <li class="list-group-item active" >
          <div><i class="glyphicon glyphicon-list-alt fa-2x"></i><p class="editProducts">&nbsp;Cantidad Stock</p></div>
          </li>
          <input type="text" class="form-control" name="product-quantity" value="<?php echo remove_junk($product['quantity']);?>">
          </ul>
          </div>
          </div>
          </div>

        <div class="form-group">
        <div class="row">
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <div><i class="glyphicon glyphicon-list-alt fa-2x"></i><p class="editProducts">&nbsp;Fecha Vencimiento</p></div>
        </li>
        <input type="text" class="form-control" name="product-existencia" value="<?php echo remove_junk($product['existencia']);?>">
        </ul>
        </div>
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <div><i class="glyphicon glyphicon-usd fa-2x"></i><p class="editProducts">&nbsp;Precio Compra</p></div>
        </li>
        <input type="text" class="form-control" name="buying-price" value="<?php echo remove_junk($product['buy_price']);?>">
        </ul>
        </div>
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <div><i class="glyphicon glyphicon-usd fa-2x"></i><p class="editProducts">&nbsp;Precio Venta</p></div>
        </li>
        <input type="text" class="form-control" name="saleing-price" value="<?php echo remove_junk($product['sale_price']);?>">
        </ul>
        </div>
        </div>
        </div>
        <button type="submit" name="product" class="btn btn-danger">Actualizar</button>
             </form>
          </div>
        </form>
      </div>
    </div>



<?php include_once('layouts/footer.php'); ?>


  <!--/Nuevo-->
