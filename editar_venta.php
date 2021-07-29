<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Editar Venta';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$sale = find_by_id('sales',(int)$_GET['id']);
if(!$sale){
  $session->msg("d","Missing product id.");
  redirect('listado_ventas.php');
}
?>
<?php $product = find_by_id('products',$sale['product_id']); ?>
<?php

  if(isset($_POST['update_sale'])){
    $req_fields = array('title','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$product['id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE sales SET";
          $sql .= " product_id= '{$p_id}',qty={$s_qty},price='{$s_total}',date='{$s_date}'";
          $sql .= " WHERE id ='{$sale['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($s_qty,$p_id);
                    $session->msg('s',"Venta Actualizada");
                    redirect('editar_venta.php?id='.$sale['id'], false);
                  } else {
                    $session->msg('d',' Sorry failed to updated!');
                    redirect('listado_ventas.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('editar_venta.php?id='.(int)$sale['id'],false);
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

    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="listado_ventas.php" class="btn btn-danger">LISTADO VENTA</a>&nbsp;
           <a href="agregar_venta.php" class="btn btn-primary">AGREGAR VENTA</a>
         </div>

        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>EDITAR VENTA</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Nombre Producto </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Cantidad </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Precio </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Total </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Fecha </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Acción </th>


              </tr>
            </thead>
            <tbody>
            <tbody  id="product_info">
              <tr>
              <form method="post" action="editar_venta.php?id=<?php echo (int)$sale['id']; ?>">
                <td id="s_name">
                  <input type="text" class="form-control" id="sug_input" name="title" value="<?php echo remove_junk($product['name']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
                <td id="s_qty">
                  <input type="text" class="form-control" name="quantity" value="<?php echo (int)$sale['qty']; ?>">
                </td>
                <td id="s_price">
                  <input type="text" class="form-control" name="price" value="<?php echo remove_junk($product['sale_price']); ?>" >
                </td>
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($sale['price']); ?>">
                </td>
                <td id="s_date">
                  <input type="date" class="form-control datepicker" name="date" data-date-format="" value="<?php echo remove_junk($sale['date']); ?>">
                </td>
                <td>
                  <button type="submit" name="update_sale" class="btn btn-primary">Actualizar</button>
                </td>
              </form>
              </tr>
           </tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
