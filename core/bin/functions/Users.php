<?php

function Users() {
  $db = new Conexion();
  $sql = $db->query("SELECT * FROM  profesor;");

  if($db->rows($sql) > 0) {
    while($d = $db->recorrer($sql)) {
      $users[$d['profesor_id']] = array(
        'profesor_id' => $d['profesor_id'],
        'telefono_id' => $d['telefono_id'],
        'escuela_id' => $d['escuela_id'],
        'nombre' => $d['nombre'],
        'apellido' => $d['apellido'],
        'edad' => $d['edad'],
        'correo' => $d['correo'],
        'password' => $d['password']
      );
    }
  } else {
    $users = false;
  }
  $db->liberar($sql);
  $db->close();

  return $users;
}

?>
