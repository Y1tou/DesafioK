<?php

include "modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query(" select * from personas where id=$id ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <!-- Formulario de datos de la Persona -->
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center text-secondary">Modificar datos</h3>
        <input type="hidden" name="id" value="<?=$_GET["id"]?>" >
        <?php
        include "controlador/modificar_datos.php";
        while ($datos = $sql->fetch_object()) { ?>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>" required>
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>" required>
            </div>

            <!-- Rut y DV -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rut</label>
                <div class="d-flex">
                    <input type="number" class="form-control me-1" style="width: 70%;" name="rut" placeholder="Rut" value="<?= $datos->rut ?>" disabled>
                    <span class="align-self-center">- </span>
                    <input type="text" class="form-control" style="width: 30%;" name="cv" maxlength="1" placeholder="DV" value="<?= $datos->cv ?>" disabled>
                </div>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sexo</label>
                <input type="phone" class="form-control" name="sexo" value="<?= $datos->sexo ?>" disabled>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono</label>
                <input type="phone" class="form-control" name="telefono" value="<?= $datos->telefono ?>" required>
            </div>

            <!-- Direccion -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" value="<?= $datos->direccion ?>" required>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fnacimiento" value="<?= $datos->fecha_nacimiento ?>" disabled>
            </div>

            <!-- Correo Electronico -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo_electronico ?>" required>
            </div>
        <?php }
        ?>

        <button type="submit" class="btn btn-primary" name="btnmodificar" value="ok">Modificar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>