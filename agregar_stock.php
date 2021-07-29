<?php
  $page_title = 'Agregar Productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $todas_categories = find_all('categories');
  //$all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_titulo = remove_junk($db->escape($_POST['product-titulo']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_descriptores = remove_junk($db-> escape($_POST['product-descriptores']));
     $p_existencia = remove_junk($db-> escape($_POST['product-existencia']));
     $p_editorial = remove_junk($db-> escape($_POST['product-editorial']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));

     $date    = make_date();
     $query  = "INSERT INTO products (";
     $query .="`products`.`name`,`titulo`, `quantity`,`buy_price`,`sale_price`, `categorie_id`,`descriptores`,`date`,`existencia`,`editorial`";
     $query .=") VALUES (";
     $query .="'{$p_name}', '{$p_titulo}', '{$p_qty}', '{$p_buy}', '{$p_sale}','{$p_cat}', '{$p_descriptores}','{$date}', '{$p_existencia}','{$p_editorial}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"PRODUCTO AGREGADO EXITOSAMENTE");
       redirect('agregar_stock.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('agregar_stock.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('agregar_stock.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>

<style>
#separador{
  margin-top:10px;
}
</style>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="stock.php" class="btn btn-primary">Listado Productos</a>
         </div>

        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Producto</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="agregar_stock.php  ?>" class="clearfix">
              <div class="form-group">
                <div class="row">
                <div class="col-md-3" id="separador">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-user"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Nombre Producto">
               </div>
             </div>
             <div class="col-md-3" id="separador">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-signal"></i>
                  </span>
                  <input type="text" class="form-control" name="product-titulo" placeholder="Marca">
               </div>
             </div>
             <div class="col-md-3" id="separador">
               <select class="form-control" name="product-categorie">
                 <option value="">Ingrese Categoría Producto</option>
                   <?php  foreach ($todas_categories as $cat): ?>
                     <option value="<?php echo (int)$cat['id'] ?>">
                   <?php echo $cat['name'] ?></option>
                 <?php endforeach; ?>
               </select>
             </div>
             <div class="col-md-3" id="separador">
               <div class="input-group">
                <span class="input-group-addon">
                 <i class="glyphicon glyphicon-book"></i>
                </span>
                <input type="text" class="form-control" name="product-quantity" step="1" placeholder="Cantidad">
             </div>
             </div>

           </div>
         </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-4" id="separador">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-th-list"></i>
                      </span>
                      <input type="text" class="form-control" name="product-existencia" placeholder="Fecha de Vencimiento">
                    </div>
                  </div>
                  <div class="col-md-4" id="separador">
                       <div class="input-group">
                         <span class="input-group-addon">
                           <i class="glyphicon glyphicon-usd"></i>
                         </span>
                         <input type="number" class="form-control" name="buying-price" placeholder="Precio de compra">
                         <span class="input-group-addon">.00</span>
                      </div>
                     </div>
                      <div class="col-md-4" id="separador">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="glyphicon glyphicon-usd"></i>
                          </span>
                          <input type="number" class="form-control" name="saleing-price" placeholder="Precio de venta">
                          <span class="input-group-addon">.00</span>
                       </div>
                      </div>
                </div>
              </div>

              <button type="submit" name="add_product" class="btn btn-danger">Agregar Productos</button>

          </form>
         </div>
        </div>
      </div>
    </div>
  </div>



<?php include_once('layouts/footer.php'); ?>
