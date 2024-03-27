<?php
  //session_start();
require_once('core/models/class.Conexion.php');

if(!empty($_REQUEST['historiaId']) and isset($_REQUEST['historiaId'])
    and !empty($_REQUEST['title']) and isset($_REQUEST['title'])
    and !empty($_REQUEST['desc']) and isset($_REQUEST['desc'])
    and !empty($_REQUEST['date']) and isset($_REQUEST['date'])
    and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId']) ){


    $historiaId = $_REQUEST['historiaId'];
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $date = $_REQUEST['date'];
    $rvideo = $_REQUEST['url'];

    $db = new Conexion();


    $getCard = $db -> prepare("SELECT * FROM linea_del_tiempo WHERE historiaId=:historiaId");
    $getCard->bindValue(':historiaId', $historiaId, PDO::PARAM_INT);
    $getCard->execute();
    $card = $getCard->fetch();

    $destino1 = isset($card['ruta_imagen1']) ? $card['ruta_imagen1'] :'';
    $destino2 = isset($card['ruta_imagen2']) ? $card['ruta_imagen2'] :'';
    $destino3 = isset($card['ruta_imagen3']) ? $card['ruta_imagen3'] :'';
    
    if(isset($_FILES['image1']['tmp_name'])){
        $destino1= "public_html/img/img_cards/imgTimeline".($historiaId)."-1.jpg";
        $foto1ruta =$_FILES['image1']['tmp_name'];
        copy($foto1ruta,$destino1);
    }
    if(isset($_FILES['image2']['tmp_name'])){
        $foto2ruta =$_FILES['image2']['tmp_name'];
        $destino2= "public_html/img/img_cards/imgTimeline".($historiaId)."-2.jpg";
        copy($foto2ruta,$destino2);
    }
    if(isset($_FILES['image3']['tmp_name'])){
        $foto3ruta =$_FILES['image3']['tmp_name'];
        $destino3= "public_html/img/img_cards/imgTimeline".($historiaId)."-3.jpg";
        copy($foto3ruta,$destino3);
    }
    //Registro DB

    $sql = $db -> prepare('UPDATE linea_del_tiempo SET titulo=:title, descripcion=:desc, fecha=:date, ruta_imagen1=:rimg1,ruta_imagen2=:rimg2, ruta_imagen3=:rimg3, ruta_video=:rvideo WHERE historiaId=:historiaId');
    $sql->bindValue(':historiaId', $historiaId, PDO::PARAM_INT);
    $sql->bindValue(':title', $title, PDO::PARAM_STR);
    $sql->bindValue(':desc', $desc, PDO::PARAM_STR);
    $sql->bindValue(':date', $date, PDO::PARAM_STR);
    $sql->bindValue(':rimg1', $destino1, PDO::PARAM_STR);
    $sql->bindValue(':rimg2', $destino2, PDO::PARAM_STR);
    $sql->bindValue(':rimg3', $destino3, PDO::PARAM_STR);
    $sql->bindValue(':rvideo', $rvideo, PDO::PARAM_STR);
    $sql->execute();

    $db->close_con();
    echo "1";
}else{
    echo "Faltan datos";
}


?>
