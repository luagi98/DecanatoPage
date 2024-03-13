<?php
  require_once('core/models/class.Conexion.php');
  // $input = file_get_contents('php://input');
// print_r($_POST);
if(!empty($_REQUEST['usuario']) and !empty($_REQUEST['contra'])) {

  $dbn = new Conexion();
  //$pass = Encrypt($_REQUEST['pass']);
  $user = $_REQUEST['usuario'];
  $password = $_REQUEST['contra'];
  $sql = $dbn->prepare('SELECT * FROM usuarios WHERE contra= :pass AND username=:user');
  $sql-> bindValue(':pass', $password, PDO::PARAM_STR);
  $sql-> bindValue(':user', $user, PDO::PARAM_STR);
  $sql-> execute();
  $obtenido = $sql->fetch();
  $dbn->close_con();
  if($obtenido) {
      $_SESSION['usuarioId']=$obtenido['usuarioId'];
      $_SESSION['username'] = $obtenido['username'];
      echo 1;
  } else {
      echo('No se encontro tu usuario');
  }
} else {
  echo 'Accesa datos validos';
}

?>
