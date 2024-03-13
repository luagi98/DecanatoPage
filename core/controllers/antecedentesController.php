<?php
if(($_GET['view'])){
     include('public_html/antecedentes.php');
}else{
  header("location: index.php?view=error");
}
 ?>
