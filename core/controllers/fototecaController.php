<?php
  if(isset($_GET['view'])){
     include('public_html/fototeca.php');

}else{
  header("location: index.php?view=error");
}
 ?>
