<?php
require_once('core/models/class.Conexion.php');
if(!empty($_POST['historiaId']) and isset($_POST['historiaId'])
    and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId'])) {

   $db = new Conexion();
   $historiaId = $_POST['historiaId'];
   $sql2 = $db->prepare('SELECT * FROM linea_del_tiempo WHERE historiaId=:historiaId');
   $sql2->bindValue(':historiaId', $historiaId, PDO::PARAM_INT);
   $sql2-> execute();
   $stories = $sql2->fetchAll();
   foreach($stories as $story){
       if($story['ruta_imagen1']!="")
        unlink($story['ruta_imagen1']);
       if($story['ruta_imagen2']!="")
        unlink($story['ruta_imagen2']);
       if($story['ruta_imagen3']!="")
        unlink($story['ruta_imagen3']);
   }


   $sql = $db->prepare('DELETE FROM linea_del_tiempo WHERE historiaId=:historiaId');
   $sql->bindValue(':historiaId', $historiaId, PDO::PARAM_INT);
   $sql-> execute();
   $db->close_con();
    //$escuela= $db->recorrer($sql)[2];
    echo 1;
} else {
  echo 'No se elimino';
}

?>
