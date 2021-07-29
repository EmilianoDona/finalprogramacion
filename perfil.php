<?php
  $page_title = 'Mi perfil';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);

?>
<style>
#frenteBajar{
  margin-top:40px;
}
#fichaPersonal{
 color: black;
 font-weight: bold;
 font-size: 20px;
}
#fichaPersonalNombre{
 color: black;
 font-weight: bold;
 font-size: 16px
}
#fichaPersonalUsuario{
  color: black;
  font-weight: bold;
  font-size: 16px
}
#foto{
  width:100%
}
#datosPersonales{
font-weight: bold;
display: flex;
justify-content: center;
margin-top: 20px;
margin-bottom: 20px;"
}
</style>
  <?php
  $user_id = (int)$_GET['id'];
  if(empty($user_id)):
    redirect('home.php',false);
  else:
    $user_p = find_by_id('users',$user_id);
  endif;
?>
<?php include_once('layouts/header.php'); ?>
<div class="row" id="frenteBajar">
   <div class="col-md-4" >
       <div class="panel profile" >
        <!--Cards-->
        <div class="card" >
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h5>Ficha Personal</h5>
  </div>
</div>
  <div class="col-md-12" >
    <h4 class="display-4" id="datosPersonales">Datos Personales</h4>
  </div>
<table class="table table-hover table-dark">
  <tbody>
    <tr>
      <td id="fichaPersonalNombre">Nombre:</td>
      <td id="fichaPersonalNombre"><?php echo first_character($user_p['name']); ?></td>
    </tr>
    <tr>
      <td id="fichaPersonalUsuario">Usuario:</td>
      <td id="fichaPersonalUsuario"><?php echo first_character($user_p['username']); ?></td>
    </tr>
  </tbody>
</table>








<?php if( $user_p['id'] === $user['id']):?>
<?php endif;?>

</div>
        <!--/Cards-->

  <div class="btn-group" style="margin-top: 20px; margin-bottom: 20px; width: 100%;display:flex;justify-content: center;">
    <a href="home.php"  style="width: 150px;" class="btn btn-md btn-warning" data-toggle="tooltip" >Ir a Dashboard
    <span class="glyphicon glyphicon-home"></span>
    </a>
    <a href="editar_cuenta.php"  style="width: 150px;" class="btn btn-md btn-primary" data-toggle="tooltip" title="Editar Cuenta">Editar Cuenta
    <span class="glyphicon glyphicon-edit"></span>
    </a>
  </div>



       </div>
   </div>
</div>





<?php include_once('layouts/footer.php'); ?>
