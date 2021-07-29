<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Lista de grupos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
  $all_groups = find_all('user_groups');
?>
<?php include_once('layouts/header.php'); ?>
<style>
#row{
  margin-top:40px
}
</style>
<div class="row" id="row">
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
        <span>Grupos</span>
     </strong>
       <a href="agregar_grupos.php" class="btn btn-info pull-right btn-xl"> Agregar grupo</a>
    </div>
     <div class="panel-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;background-color:#E5FEC4">#</th>
            <th style="background-color:#E5FEC4">Nombre del grupo</th>
            <th class="text-center" style="width: 20%;background-color:#E5FEC4">Nivel del grupo</th>
            <th class="text-center" style="width: 15%;background-color:#E5FEC4">Estado</th>
            <th class="text-center" style="width: 100px;background-color:#E5FEC4">Acciones</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_groups as $a_group): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_group['group_name']))?></td>
           <td class="text-center">
             <?php echo remove_junk(ucwords($a_group['group_level']))?>
           </td>
           <td class="text-center">
           <?php if($a_group['group_status'] === '1'): ?>
            <span class="label label-success"><?php echo "Activo"; ?></span>
          <?php else: ?>
            <span class="label label-danger"><?php echo "Inactivo"; ?></span>
          <?php endif;?>
           </td>
           <td class="text-center">
             <div class="btn-group">
                <a href="editar_grupos.php?id=<?php echo (int)$a_group['id'];?>" class="btn btn-xl btn-warning" data-toggle="tooltip" title="Editar">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>


                <a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_grupos.php?id=<?php echo (int)$a_group['id'];?>'
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