<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Final Programación";?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
    <link rel="stylesheet" href="libs/css/menuLateral.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
  </head>
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>
  <style>
  #encabezado{
  color:white;
  text-decoration:none
  }
  </style>
<div class="container">
  <div class="row">
    <div class="col-3">
      <!--MENU ADMIN - USUARIO - ESPECIAL-->
                <div class="sidebar">
      <?php if($user['user_level'] === '1'): ?>

      <?php include_once('administrador.php');?>

    <?php elseif($user['user_level'] === '2'): ?>

      <?php include_once('empleado.php');?>

      <?php endif;?>
   </div>
   <!--/MENU ADMIN - USUARIO - ESPECIAL-->
    </div>
  </div>
</div>

<?php endif;?>
<div class="page">
  <div class="container-fluid">
<script src="../libs/js/jBox.all.js"></script>
<script src="../libs/js/demo.js"></script>
