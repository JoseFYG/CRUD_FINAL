<?php
require '../vendor/autoload.php';

use Clases\Profesores;

$id=$_GET['id'];

$profesor=new Profesores();
$profesor->setId($id);
$datos=$profesor->read();
$datos1=$datos->fetch(PDO::FETCH_OBJ);

if(isset($_POST['editar'])){

    $nombre=ucwords(trim($_POST['nombre']));
    $sueldo=$_POST['sueldo'];
    $fecha=ucwords(trim($_POST['fecha']));
    $idDep=$_POST['select'];

    $profesor= new Profesores();
    $profesor->setNombre($nombre);
    $profesor->setSueldo($sueldo);
    $profesor->setFecha($fecha);
    $profesor->setIdDep($idDep);
    $profesor->update();

    $profesor=null;
    header("Location:profesores.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Profesor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Editar Profesor</h1>
<div class="container">
<form name="nt" action="<?php echo $_SERVER['PHP_SELF']."?id=$id";?>" method="POST">
<div class="mt-2">
<input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2" value="<?php echo $datos1->nom_prof; ?>"/>
</div>
<div class="mt-2">
<input type="decimal" name="sueldo" placeholder="Sueldo" required class="form-control mb-2" value="<?php echo $datos1->sueldo; ?>"/>
</div>
<div class="mt-2">
<input type="text" name="fecha" placeholder="Fecha Nacimiento (yyyy-mm-dd)" required class="form-control mb-2" value="<?php echo $datos1->fecha_prof; ?>"/>
</div>
<div class="mt-2">
<select name="select" class="form-control mt-4">
<option value="<?php echo $datos1->dep; ?>"></option>
</select>
</div>
<div class="mt-4">
<input type="submit" name="editar" value="Editar" class="btn btn-success mr-2"/>
<a href="profesores.php" class="btn btn-primary mr-2">Volver</a>
</div>
</form>
</div>
</body>
</html>