<?php
require_once('core/models/class.Conexion.php');
if(!empty($_POST['fototecaId']) and isset($_POST['fototecaId'])
    and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId'])) {

   $db = new Conexion();
   $fototecaId = $_POST['fototecaId'];
   $sql = $db->prepare('DELETE FROM fototeca WHERE fototecaId=:fototecaId');
   $sql->bindValue(':fototecaId', $fototecaId, PDO::PARAM_INT);
   $sql-> execute();
   $db->close_con();
    //$escuela= $db->recorrer($sql)[2];
    echo 1;
} else {
  echo 'No se elimino';
}

?>
