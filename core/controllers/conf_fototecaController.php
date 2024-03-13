<?php
if(isset($_GET['view']) and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId'])){

    if(isset($_GET['fototecaId']) and $_GET['fototecaId']!=""){
        // require_once('core/models/class.Conexion.php');
        $dbn = new Conexion();
        $sql = $dbn->prepare('SELECT * FROM fototeca WHERE fototecaId= :fototecaId');
        $sql-> bindValue(':fototecaId', $_GET['fototecaId'], PDO::PARAM_STR);
        $sql-> execute();
        $obtenido = $sql->fetch();
        $dbn->close_con();
        if($obtenido) {
            include('public_html/conf_fototeca.php');
            // echo($obtenido['descripcion']);
        }else {
            echo('No se encontrol a foto ;-;');
        }
    }else{
        include('public_html/conf_fototeca.php');
    }

}else{
  header("location: index.php?view=error");
}
 ?>
