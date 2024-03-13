<?php
if(isset($_GET['view'])){
     include('public_html/linea_del_tiempo.php');
}else{
  header("location: index.php?view=error");
}
 ?>
