<!DOCTYPE html>
<?php

$id = $_GET['id'];
require '../vendor/autoload.php';

use Clases\Profesores;

$profesor = new Profesores();
$profesor->setId($id);
$aux=$profesor->read();
$datos=$aux->fetch(PDO::FETCH_OBJ);
$post = null;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Profesores</title>
</head>

<body style="background-color: #F9A593;">
    <h3 class="text-center mt-3">Detalle Profesor</h3>

    <div class="container mt-3 mb-4 text-center">
        <div class="card m-auto text-center" style="width: 32rem">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $datos->nom_prof; ?></h5>
                <h6 class="card-subtitle my-2 text-muted"><?php
                echo "ID: {$datos->id}</a><br>";
                echo "Salario: {$datos->sueldo}</a><br>";
                echo "Fecha Nacimiento: {$datos->fecha_prof}</a><br>";
                echo "Departamento: {$datos->nom_dep}</a>";
                ?></h6>
            </div>
        </div>
        <a href="profesores.php" class="btn btn-primary m-3">Volver</a>
    </div>
</body>

</html>