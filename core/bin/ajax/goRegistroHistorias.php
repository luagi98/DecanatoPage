<?php
  //session_start();
require_once('core/models/class.Conexion.php');

if(!empty($_REQUEST['title']) and isset($_REQUEST['title'])
    and !empty($_REQUEST['desc']) and isset($_REQUEST['desc'])
    and !empty($_REQUEST['date']) and isset($_REQUEST['date'])
    and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId']) ){

    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $date = $_REQUEST['date'];
    $rvideo = $_REQUEST['url'];


    $db = new Conexion();
    $maxIdSql = $db->prepare("SELECT MAX(historiaId) FROM linea_del_tiempo");
    $maxIdSql-> execute();

    $max = $maxIdSql->fetch();
    $idStory = $max[0]+1;

    //Registro imagenes
    $destino1=$destino2=$destino3="";
    if(isset($_FILES['image1']['tmp_name'])){
        $foto1ruta =$_FILES['image1']['tmp_name'];
        $destino1= "public_html/img/img_cards/imgTimeline".($idStory)."-1.jpg";
    }
    if(isset($_FILES['image2']['tmp_name'])){
        $foto2ruta =$_FILES['image2']['tmp_name'];
        $destino2= "public_html/img/img_cards/imgTimeline".($idStory)."-2.jpg";
    }
    if(isset($_FILES['image3']['tmp_name'])){
        $foto3ruta =$_FILES['image3']['tmp_name'];
        $destino3= "public_html/img/img_cards/imgTimeline".($idStory)."-3.jpg";
    }
    if(isset($foto1ruta)) copy($foto1ruta,$destino1);
    if(isset($foto2ruta)) copy($foto2ruta,$destino2);
    if(isset($foto3ruta)) copy($foto3ruta,$destino3);

    //Registro DB

    $sql = $db -> prepare('INSERT INTO linea_del_tiempo VALUES (0, :date,:title, :desc, :rimg1,:rimg2,:rimg3,:rvideo)');
    $sql->bindValue(':date', $date, PDO::PARAM_STR);
    $sql->bindValue(':title', $title, PDO::PARAM_STR);
    $sql->bindValue(':desc', $desc, PDO::PARAM_STR);
    $sql->bindValue(':rimg1', $destino1, PDO::PARAM_STR);
    $sql->bindValue(':rimg2', $destino2, PDO::PARAM_STR);
    $sql->bindValue(':rimg3', $destino3, PDO::PARAM_STR);
    $sql->bindValue(':rvideo', $rvideo, PDO::PARAM_STR);
    $sql->execute();

    $db->close_con();
    echo "1";
}


?>
