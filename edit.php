<?php
include("db.php");
$nombre = '';
$telefono= '';
$direccion= '';


if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tarea WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $telefono = $row['telefono'];
    $direccion = $row['direccion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $telefono = $_POST['telefono'];
  $direccion = $_POST['direccion'];


  $query = "UPDATE tarea set nombre = '$nombre', telefono = '$telefono', direccion = '$direccion' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'El registro se ha actualizado';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control my-02" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombre">
        </div>
        <div class="form-group">
          <input name="telefono" type="tel" class="form-control my-02" value="<?php echo $telefono; ?>" placeholder="Actualizar Telefono">
        </div>
        <div class="form-group">
          <input name="direccion" type="text" class="form-control mt-02" value="<?php echo $direccion; ?>" placeholder="Actualizar Direccion">
        </div>
        <button class="btn-success mt-02" name="update">
         Actualizar
          
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
