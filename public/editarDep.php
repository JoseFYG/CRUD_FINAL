<?php
require '../vendor/autoload.php';

use Clases\Departamentos;

$id=$_GET['id'];

$departamento=new Departamentos();
$departamento->setId($id);
$datos=$departamento->read();
$datos1=$datos->fetch(PDO::FETCH_OBJ);


if(isset($_POST['editar'])){
    
    $nombre=trim($_POST['nombre']);

    $departamento->setNombre(ucwords($nombre));
    $departamento->update();
    $departamento=null;

    header("Location:departamentos.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Editar Artículos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Editar Departamento</h1>
<div class="container text-center">
<form name="nt" action="<?php echo $_SERVER['PHP_SELF']."?id=$id";?>" method="POST">
<div class="mt-2">
<input type="text" name="nombre" value="<?php echo $datos1->nom_dep; ?>" required class="form-control mb-2"/>
</div>
<div>
<input type="submit" name="editar" value="Editar" class="btn btn-success mr-2"/>
<a href="departamentos.php" class="btn btn-primary mr-2">Volver</a>
</div>
</form>
</div>
</body>
</html>