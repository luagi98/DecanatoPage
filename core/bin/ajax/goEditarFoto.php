<?php
  //session_start();
require_once('core/models/class.Conexion.php');

if(!empty($_REQUEST['fototecaId']) and isset($_REQUEST['fototecaId'])
    and !empty($_REQUEST['title']) and isset($_REQUEST['title'])
    and !empty($_REQUEST['desc']) and isset($_REQUEST['desc'])
    and !empty($_REQUEST['date']) and isset($_REQUEST['date'])
    and !empty($_SESSION['usuarioId']) and isset($_SESSION['usuarioId']) ){


    $fototecaId = $_REQUEST['fototecaId'];
    $title = $_REQUEST['title'];
    $desc = $_REQUEST['desc'];
    $date = $_REQUEST['date'];


    $db = new Conexion();

    $getCard = $db -> prepare("SELECT * FROM fototeca WHERE fototecaId=:fototecaId");
    $getCard->bindValue(':fototecaId', $fototecaId, PDO::PARAM_INT);
    $getCard->execute();
    $card = $getCard->fetch();


    //Registro imagenes
    $destino = isset($card['ruta_imagen']) ? $card['ruta_imagen'] :'';
    if(isset($_FILES['image']['tmp_name'])){
        $destino= "fototecaImg/foto".($fototecaId).".jpg";
        $foto1ruta =$_FILES['image']['tmp_name'];
        copy($foto1ruta,$destino);
    }

    //Registro DB

    $sql = $db -> prepare('UPDATE fototeca SET titulo=:title, descripcion=:desc, fecha=:date, ruta_imagen=:destino WHERE fototecaId=:fototecaId');
    $sql->bindValue(':fototecaId', $fototecaId, PDO::PARAM_INT);
    $sql->bindValue(':title', $title, PDO::PARAM_STR);
    $sql->bindValue(':desc', $desc, PDO::PARAM_STR);
    $sql->bindValue(':date', $date, PDO::PARAM_STR);
    $sql->bindValue(':destino', $destino, PDO::PARAM_STR);
    $sql->execute();

    $db->close_con();
    echo "1";
}else{
    echo "Faltan datos";
}


// if(!empty($_REQUEST['nombre']) and !empty($_REQUEST['descripcion'])
//    and !empty($_REQUEST['pasos']) and !empty($_REQUEST['tiempo'])
//    and !empty($_REQUEST['idIngre'])  and !empty($_REQUEST['cantIngre'])
//    and !empty($_REQUEST['idMedida']) and !empty($_REQUEST['idComensal'])
//    and !empty($_REQUEST['idHerra']) and !empty($_REQUEST['cantHerra'])
//    and isset($_SESSION['idUsuario']) and isset($_FILES["file"]["name"])) {
//
//   $db = new Conexion();
//   $sql = $db->prepare("SELECT MAX(idReceta) FROM recetas");
//   $sql-> execute();
//
//   $max = $sql->fetch();
//   $idReceta = $max[0]+1;
//
//
//   $arraypasos = explode (",", $_REQUEST['pasos']);
//   $arrayIdHerra = explode (",", $_REQUEST['idHerra']);
//   $arrayCantHerra = explode (",", $_REQUEST['cantHerra']);
//   $arrayIdIngre = explode (",", $_REQUEST['idIngre']);
//   $arrayIdMedida = explode (",", $_REQUEST['idMedida']);
//   $arrayCantIngre = explode (",", $_REQUEST['cantIngre']);
//    // echo $_REQUEST['idHerra'];
//
//   //informacion nutricional
//
//   $grasas=0;
//   $fibra=0;
//   $carbohidratos=0;
//   $proteinas=0;
//   $colesterol=0;
//   $calorias=0;
//
//   for($i=0; $i<sizeof($arrayIdMedida) ;$i++){
//     $nutri = $db->prepare('SELECT * FROM ingredientes, tipoMedidaIngrediente WHERE ingredientes.idIngrediente=tipoMedidaIngrediente.idIngrediente AND tipoMedidaIngrediente.idTipoMedida=:id');
//     $nutri->bindValue(':id', $arrayIdMedida[$i], PDO::PARAM_INT);
//     $nutri-> execute();
//     $obtenidoreceta = $nutri->fetch();
//     if($obtenidoreceta) {
//         $grasas+=($obtenidoreceta['grasas']*$obtenidoreceta['valorMedida'])/(100.0);
//         $fibra+=($obtenidoreceta['fibra']*$obtenidoreceta['valorMedida'])/(100.0);
//         $carbohidratos+=($obtenidoreceta['carbohidratos']*$obtenidoreceta['valorMedida'])/(100.0);
//         $proteinas+=($obtenidoreceta['proteinas']*$obtenidoreceta['valorMedida'])/(100.0);
//         $colesterol+=($obtenidoreceta['colesterol']*$obtenidoreceta['valorMedida'])/(100.0);
//         $calorias+=($obtenidoreceta['calorias']*$obtenidoreceta['valorMedida'])/(100.0);
//
//     }else echo "no hay respuesta";
//   }
//
//   //Registro imagenes
//   $foto1ruta =$_FILES['file']['tmp_name'];
//
//   $destino1= "imgReceta/receta" . ($idReceta) .".jpg";
//   $destino1fake= "imgReceta/receta" . ($idReceta) .".jpg";
//
//
//   copy($foto1ruta,$destino1);
//
//
//
//   //Registro de Receta
//   $receta = $db->prepare('INSERT INTO recetas(idUsuario,idComensal,nombreReceta,tiempodePreparacion,imagenReceta,descripcionReceta,grasas,fibra,carbohidratos,proteinas,colesterol,calorias)
//     VALUES (:idUser,:idComen,:nombRec,:tiempoPrep,:image1,:descRec,:gras,:fib,:car,:prot,:col,:cal)');
//   $receta->bindValue(':idUser', $_SESSION['idUsuario'], PDO::PARAM_INT);
//   $receta->bindValue(':idComen', $_REQUEST['idComensal'], PDO::PARAM_INT);
//   //$receta->bindValue(':idInfo', NULL, PDO::PARAM_STR);
//   $receta->bindValue(':nombRec', $_REQUEST['nombre'], PDO::PARAM_STR);
//   $receta->bindValue(':tiempoPrep', $_REQUEST['tiempo'], PDO::PARAM_STR);
//   $receta->bindValue(':image1', $destino1fake, PDO::PARAM_STR);
//   $receta->bindValue(':descRec', $_REQUEST['descripcion'], PDO::PARAM_STR);
//   $receta->bindParam(':gras', strval($grasas), PDO::PARAM_STR);
//   $receta->bindParam(':fib', strval($fibra), PDO::PARAM_STR);
//   $receta->bindParam(':car', strval($carbohidratos), PDO::PARAM_STR);
//   $receta->bindParam(':prot', strval($proteinas), PDO::PARAM_STR);
//   $receta->bindParam(':col', strval($colesterol), PDO::PARAM_STR);
//   $receta->bindParam(':cal', strval($calorias), PDO::PARAM_STR);
//   $receta-> execute();
//   // echo $receta;
//
//
//   for($i=0; $i<sizeof($arraypasos)-1 ;$i++){
//     $pasos = $db->prepare('INSERT INTO pasos(idReceta,descripcionPaso,numeroPaso) VALUES (:idRec,:descri,:num)');
//     $pasos->bindValue(':descri', $arraypasos[$i], PDO::PARAM_STR);
//     $pasos->bindValue(':idRec', $idReceta , PDO::PARAM_INT);
//     $pasos->bindValue(':num', $i+1 , PDO::PARAM_INT);
//     $pasos-> execute();
//
//   }
//
//
//   for($i=0; $i<sizeof($arrayIdHerra) ;$i++){
//     $herramientasReceta = $db->prepare('INSERT INTO HerramientasReceta(idReceta,idHerramienta,cantidadHerramienta)
//      VALUES (:idRec,:idHerra,:cantHerra)');
//     $herramientasReceta->bindValue(':idRec', $idReceta , PDO::PARAM_INT);
//     $herramientasReceta->bindValue(':idHerra', $arrayIdHerra[$i] , PDO::PARAM_INT);
//     $herramientasReceta->bindValue(':cantHerra', $arrayCantHerra[$i] , PDO::PARAM_INT);
//     $herramientasReceta-> execute();
//   }
//
//   for($i=0; $i<sizeof($arrayIdIngre) ;$i++){
//
//     $ingredienteReceta = $db->prepare('INSERT INTO IngredientesReceta(idReceta,idTipoMedida,cantidadIngrediente)
//      VALUES (:idRec,:idTipo,:cantIngre)');
//     $ingredienteReceta->bindValue(':idRec', $idReceta , PDO::PARAM_INT);
//     $ingredienteReceta->bindValue(':idTipo',  $arrayIdMedida[$i] , PDO::PARAM_INT);
//     $ingredienteReceta->bindValue(':cantIngre',$arrayCantIngre[$i] , PDO::PARAM_INT);
//     $ingredienteReceta-> execute();
//   }
//
//    $db->close_con();
//    echo 'funciono';
// } else {
//   if(!isset($_SESSION['idUsuario']) ) echo "Debes iniciar sesión!";
//   else echo 'Introduce datos validos' ;
//   //header("Location:".$_SERVER['HTTP_REFERER']);
// }

?>
