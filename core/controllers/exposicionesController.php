<?php
if(isset($_GET['view'])){
     include('public_html/exposiciones.php');
}else{
  header("location: index.php?view=error");
}
 ?>
