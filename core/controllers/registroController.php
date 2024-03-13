<?php
  if(isset($_GET['view'])){
     include('public_html/registro.php');
  }else{
    header("location: index.php?view=error");
  }
 ?>
