<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];
  $query = "INSERT INTO tarea(nombre, telefono, direccion) VALUES ('$nombre', '$telefono', '$direccion')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Registro Guardado';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>