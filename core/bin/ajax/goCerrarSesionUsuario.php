<?php
  unset($_SESSION['usuarioId']);
  unset($_SESSION['username']);
  // unset($_SESSION['idAdmin']);
  if(!isset($_SESSION['usuarioId']) and !isset($_SESSION['username'])){ echo 1;}
  else{echo 'error';}
  
  session_destroy();

 ?>
