<?php

if(isset($_POST)) {

  require_once('core/core.php');

  switch (isset($_GET['mode']) ? $_GET['mode'] : null) {

    case 'loginUsuario':
      require('core/bin/ajax/goLoginUsuario.php');
      break;
    case 'cerrarSesionUsuario':
      require('core/bin/ajax/goCerrarSesionUsuario.php');
      break;

    case 'eliminarFoto':
        require('core/bin/ajax/goEliminarFoto.php');
        break;
    case 'eliminarHistoria':
        require('core/bin/ajax/goEliminarHistoria.php');
        break;
    case 'registroFotos':
      require('core/bin/ajax/goRegistroFoto.php');
      break;
    case 'registroHistorias':
      require('core/bin/ajax/goRegistroHistorias.php');
      break;
    case 'editarFotos':
      require('core/bin/ajax/goEditarFoto.php');
      break;
    case 'editarHistorias':
      require('core/bin/ajax/goEditarHistoria.php');
      break;
    default:
      header('location: index.php');
      break;
  }
} else {
  header('location: index.php');
}


?>
