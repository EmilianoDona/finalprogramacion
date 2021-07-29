<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Agregar Venta';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Venta agregada ");
                  redirect('agregar_venta.php', false);
                } else {
                  $session->msg('d','Lo siento, registro falló.');
                  redirect('agregar_venta.php', false);
                }
        } else {
           $session->msg("d", $errors);
           redirect('agregar_venta.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Búsqueda</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Ingrese nombre de Producto">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading clearfix">
         <div class="pull-right">

           <a href="listado_ventas.php" class="btn btn-primary">Todas las Ventas</a>
         </div>

        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agrega Ventas</span>
         </strong>
        </div>
</div>
      <div class="panel-body">
        <form method="post" action="agregar_venta.php">
         <table class="table table-bordered">
           <thead>
            <th style="background-color:#E5FEC4"> Producto </th>
            <th style="background-color:#E5FEC4"> Precio </th>
            <th style="background-color:#E5FEC4"> Cantidad </th>
            <th style="background-color:#E5FEC4"> Total </th>
            <th style="background-color:#E5FEC4"> Agregado</th>
            <th style="background-color:#E5FEC4"> Acciones</th>
           </thead>
             <tbody  id="product_info"> </tbody>
         </table>
       </form>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
