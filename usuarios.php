<link rel="stylesheet" href="libs/css/jBox.all.css">


<?php
  $page_title = 'Lista de usuarios';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_users = find_all_user();
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
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Usuarios</span>
       </strong>
         <a href="agregar_usuario.php" class="btn btn-info pull-right">Agregar usuario</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;background-color:#E5FEC4">#</th>
            <th style="background-color:#E5FEC4">Nombre </th>
            <th style="background-color:#E5FEC4">Usuario</th>
            <th class="text-center" style="width: 15%;background-color:#E5FEC4">Rol de usuario</th>
            <th class="text-center" style="width: 10%;background-color:#E5FEC4">Estado</th>
            <!-- <th style="width: 20%;background-color:#E5FEC4">Último login</th> -->
            <th class="text-center" style="width: 100px;background-color:#E5FEC4">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_users as $a_user): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_user['name']))?></td>
           <td><?php echo remove_junk(ucwords($a_user['username']))?></td>
           <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name']))?></td>
           <td class="text-center">
           <?php if($a_user['status'] === '1'): ?>
            <span class="label label-success"><?php echo "Activo"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactivo"; ?></span>
          <?php endif;?>
           </td>
           <!-- <td><?php echo read_date($a_user['last_login'])?></td> -->
           <td class="text-center">
             <div class="btn-group">
                <a href="editar_usuario.php?id=<?php echo (int)$a_user['id'];?>" class="btn btn-xl btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>


                <a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_usuario.php?id=<?php echo (int)$a_user['id'];?>'
                        }})">
  <span class="glyphicon glyphicon-trash"></span>

</a>


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

