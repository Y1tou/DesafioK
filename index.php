<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/878415c25e.js" crossorigin="anonymous"></script>
</head>

<body>

    <h1 class="text-center p-3">Formulario KIS</h1>

    <div class="container-fluid row">
        <!-- Formulario de datos de la Persona -->
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Formulario de Registro</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro.php";
            ?>
            <!-- Nombre -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>

            <!-- Apellido -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" required>
            </div>

            <!-- Rut y DV -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Rut</label>
                <div class="d-flex">
                    <input type="number" class="form-control me-1" style="width: 70%;" name="rut" maxlength="8" placeholder="Rut" required>
                    <span class="align-self-center">- </span>
                    <input type="text" class="form-control" style="width: 30%;" name="cv" maxlength="1" placeholder="DV" required>
                </div>
            </div>

            <!-- Sexo -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Sexo</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="M">
                    <label class="form-check-label" for="inlineRadio1">M</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F">
                    <label class="form-check-label" for="inlineRadio2">F</label>
                </div>
            </div>

            <!-- Telefono -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono</label>
                <input type="phone" class="form-control" name="telefono" required>
            </div>

            <!-- Direccion -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Direccion</label>
                <input type="text" class="form-control" name="direccion" required>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fnacimiento" required>
            </div>

            <!-- Correo Electronico -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" name="correo" required>
            </div>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <!-- Tabla con datos ya registrados -->
            <?php
            include "controlador/eliminar_datos.php";
            ?>
            <table class="table">
                <thead class="bg-info">
                    <!-- Columnas con los tipos de datos -->
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Fecha de Nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Conexion con la BD -->
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query(" select * from personas ");
                    while ($datos = $sql->fetch_object()) { ?>
                        <!-- Datos extraidos de la BD -->
                        <tr>
                            <td><?=$datos->id ?></td>
                            <td><?=$datos->nombre ?></td>
                            <td><?=$datos->apellido ?></td>
                            <td><?=$datos->rut ?>-<?=$datos->cv ?></td>
                            <td><?=$datos->sexo ?></td>
                            <td><?=$datos->telefono ?></td>
                            <td><?=$datos->direccion ?></td>
                            <td><?=$datos->fecha_nacimiento ?></td>
                            <td><?=$datos->correo_electronico?></td>
                            <!-- Botones de editar y eliminar registros -->
                            <td>
                                <a href="modificar.php?id=<?=$datos->id?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="index.php?id=<?=$datos->id?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>