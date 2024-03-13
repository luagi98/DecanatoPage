<?php
if(isset($_GET['view']) and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId'])){
     include('public_html/conf_linea_del_tiempo.php');
}else{
  header("location: index.php?view=error");
}
 ?>
