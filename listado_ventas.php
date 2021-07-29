<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Listado de Ventas';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$sales = find_all_sale();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading clearfix">
         <div class="pull-right">
              
           <a href="agregar_venta.php" class="btn btn-primary">Agregar Venta</a>
         </div>
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Listado Ventas</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;background-color:#E5FEC4">#</th>
                <th style="background-color:#E5FEC4"> Nombre del producto </th>
                <th class="text-center" style="width: 15%;background-color:#E5FEC4"> Cantidad</th>
                <th class="text-center" style="width: 15%;background-color:#E5FEC4"> Total </th>
                <th class="text-center" style="width: 15%;background-color:#E5FEC4"> Fecha </th>
                <th class="text-center" style="width: 100px;background-color:#E5FEC4"> Acciones </th>
             </tr>
            </thead>
           <tbody>
             <?php foreach ($sales as $sale):?>
             <tr>
               <td class="text-center"><?php echo count_id();?></td>
               <td><?php echo remove_junk($sale['name']); ?></td>
               <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
               <td class="text-center"><?php echo remove_junk($sale['price']); ?></td>
               <td class="text-center"><?php echo $sale['date']; ?></td>
               <td class="text-center">
                  <div class="btn-group">
                     <a href="editar_venta.php?id=<?php echo (int)$sale['id'];?>" class="btn btn-warning btn-xl"  title="Edit" data-toggle="tooltip">
                       <span class="glyphicon glyphicon-edit"></span>
                     </a>

                     <a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_venta.php?id=<?php echo (int)$sale['id'];?>'
                        }})"><span class="glyphicon glyphicon-trash"></span></a>
                  </div>
               </td>
             </tr>
             <?php endforeach;?>
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
