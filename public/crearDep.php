<?php
require '../vendor/autoload.php';

use Clases\Departamentos;

if(isset($_POST['crear'])){

    $nombre=trim($_POST['nombre']);

    $departamento= new Departamentos();

    if($departamento->comprobarDepartamento(ucwords($nombre))){
        $departamento->setNombre(ucwords($nombre));

        $departamento->create();
        $departamento=null;
        header("Location:departamentos.php");
    }else{
        $articulo=null;
        header("Location:{$_SERVER['PHP_SELF']}");
        die("Este departamento ya existe");
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crear Artículos</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Crear Departamento</h1>
<div class="container text-center">
<form name="nt" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="mt-2">
<input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2"/>
</div>
<div>
<input type="submit" name="crear" value="Crear" class="btn btn-success mr-2"/>
<input type="reset" value="Limpiar" class="btn btn-warning mr-2"/>
<a href="departamentos.php" class="btn btn-primary mr-2">Volver</a>
</div>
</form>
</div>
</body>
</html>