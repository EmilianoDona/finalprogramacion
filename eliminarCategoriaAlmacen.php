<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","ID de la categoría falta.");
    redirect('agregarCategoriaAlmacen.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Categoría eliminada");
      redirect('agregarCategoriaAlmacen.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('agregarCategoriaAlmacen.php');
  }
?>
