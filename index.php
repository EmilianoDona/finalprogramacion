<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="login-page" style="margin-top: 20px; padding-top: 20px;cursor: pointer; border-radius:50px;">
    <div class="text-center" >

    <h3>Final Programación</h3>
       <h5>Login</h5>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix" >
        <div class="form-group">
              <label for="username" class="control-label">User:</label>
              <input type="name" class="form-control " name="username" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="Password" class="control-label">Password:</label>
            <input type="password" name= "password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-info  pull-right">Entrar</button>
        </div>
    </form>
        <br>
    </div>



<style type="text/css">-
@-webkit-keyframes swing { 15% { -webkit-transform: translateX(5px); transform: translateX(5px); } 30% { -webkit-transform: translateX(-5px); transform: translateX(-5px); } 50% { -webkit-transform: translateX(3px); transform: translateX(3px); } 65% { -webkit-transform: translateX(-3px); transform: translateX(-3px); } 80% { -webkit-transform: translateX(2px); transform: translateX(2px); } 100% { -webkit-transform: translateX(0); transform: translateX(0); } } @keyframes swing { 15% { -webkit-transform: translateX(5px); transform: translateX(5px); } 30% { -webkit-transform: translateX(-5px); transform: translateX(-5px); } 50% { -webkit-transform: translateX(3px); transform: translateX(3px); } 65% { -webkit-transform: translateX(-3px); transform: translateX(-3px); } 80% { -webkit-transform: translateX(2px); transform: translateX(2px); } 100% { -webkit-transform: translateX(0); transform: translateX(0); } } .swing:hover { -webkit-animation: swing 1s ease; animation: swing 1s ease; -webkit-animation-iteration-count: 1; animation-iteration-count: 1; }
</style>
