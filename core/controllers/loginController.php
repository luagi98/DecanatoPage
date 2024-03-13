<?php
  if(isset($_GET['view'])){
     include('public_html/login.php');
  }else{
    header("location: index.php?view=error");
  }
 ?>
