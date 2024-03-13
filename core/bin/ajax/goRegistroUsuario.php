<?php
  // require_once('../../models/class.Conexion.php');
if(!empty($_REQUEST['usuario']) and !empty($_REQUEST['email']) and !empty($_REQUEST['pass'])
and !empty($_REQUEST['comensal'])){
        $db = new Conexion();
    //$pass = Encrypt($_POST['pass']);
        $user=$_REQUEST['usuario'];
        $email=$_REQUEST['email'];
        $pass= $_REQUEST['pass'];
        $comen = $_REQUEST['comensal'];
        $sql = $db->prepare('SELECT * FROM usuario WHERE usuario=:user');
        $sql-> bindValue(':user', $user, PDO::PARAM_STR);
        $sql-> execute();
        $obtenido = $sql->fetch();
        if(!$obtenido) {
          $sql2 = $db->prepare('INSERT INTO usuario (nombreUsuario,contra,email,idComensal) values(:user,:contra,:email,:comen)');
          $sql2-> bindValue(':user', $user, PDO::PARAM_STR);
          $sql2-> bindValue(':contra', $pass, PDO::PARAM_STR);
          $sql2-> bindValue(':email', $email, PDO::PARAM_STR);
          $sql2-> bindValue(':comen', $comen, PDO::PARAM_INT);
          $sql2-> execute();
          echo('Registro existoso');
        } else {
            echo('El usuario ya existe');
        }
        $db->close_con();

  } else {
    echo 'Introduce datos validos' ;
    //header("Location:".$_SERVER['HTTP_REFERER']);
  }

?>
