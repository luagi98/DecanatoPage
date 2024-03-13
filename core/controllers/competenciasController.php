<?php
if(isset($_GET['view'])){
     include('public_html/competencias.php');
}else{
  header("location: index.php?view=error");
}
 ?>
