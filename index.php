<?php include("db.php") ?>

<?php include("includes/header.php") ?>
         
<div class="container p-4">

    <div class="row">

    <div class="col-md-4">


        <?php if(isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'];?>
            alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
       <?php session_unset(); } ?>


    <div class="card card-body">
        <form action="save_task.php" method="POST">
            <div class="form-group">
                <input type="text" name="nombre" class="form-control"
                placeholder="Nombre" autofocus>
            </div>

            <div class="form-group">
            <input type="tel" name="telefono" class="form-control my-2"
                placeholder="Numero Telefonico" autofocus>
            </div>

            <div class="form-group">
            <input type="text" name="direccion" class="form-control my-2"
                placeholder="Direccion" autofocus>
                
            </div>

            <input type="submit" class="btn btn-success btn-block " name="save_task" value="Guardar">

        </form>
    </div>

    </div>

    <div class="col-md-8">
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $query = "SELECT * FROM tarea"; 
                $result_task = mysqli_query($conn, $query);
                while($row = mysqli_fetch_array($result_task)){ ?>

                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['telefono'] ?></td>
                    <td><?php echo $row['direccion'] ?></td>
                    <td><?php echo $row['created_at'] ?></td>

                    <td>
                        <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                          <i class="fas fa-marker "></i>
                        </a>

                        <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

               <?php } ?>
            </tbody>
            </table>
    </div>

    </div>

</div>

  <?php include("includes/footer.php") ?>