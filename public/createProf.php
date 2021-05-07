<?php
require '../vendor/autoload.php';

use Clases\Departamentos;
use Clases\Profesores;

$profesor=new Departamentos();
$todas=$profesor->devolverTodo();
$profesor=null;

if(isset($_POST['crear'])){

    $nombre=ucwords(trim($_POST['nombre']));
    $sueldo=$_POST['sueldo'];
    $fecha=ucwords(trim($_POST['fecha']));
    $idDep=$_POST['select'];

    $profesor= new Profesores();
    $profesor->setNombre($nombre);
    $profesor->setSueldo($sueldo);
    $profesor->setFecha($fecha);
    $profesor->setIdDep($idDep);
    $profesor->create();

    $profesor=null;
    header("Location:profesores.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Crear Profesor</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body style="background-color:#FF8065;">
<h1 class="text-center m-5">Crear Profesor</h1>
<div class="container">
<form name="nt" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<div class="mt-2">
<input type="text" name="nombre" placeholder="Nombre" required class="form-control mb-2"/>
</div>
<div class="mt-2">
<input type="decimal" name="sueldo" placeholder="Sueldo" required class="form-control mb-2"/>
</div>
<div class="mt-2">
<input type="text" name="fecha" placeholder="Fecha Nacimiento (yyyy-mm-dd)" required class="form-control mb-2"/>
</div>
<div class="mt-2">
<select name="select" class="form-control mt-4">
<?php
    $cont=1;
    $abierto=false;
     while($fila=$todas->fetch(PDO::FETCH_OBJ)){
         if($cont%4==0 || $cont==1){
             echo "<div class='mt-2 row'>\n";
             $abierto=true;
         }
         echo <<< CADENA
            <option value="{$fila->id}">{$fila->nom_dep}</option>
         CADENA;

         if($cont%3==0) {
             echo "</div>\n";
             $cont=0;
             $abierto=false;
         }
         $cont++;
     }
     if($abierto) echo "</div>";
?>
</select>
</div>
<div class="mt-4">
<input type="submit" name="crear" value="Crear" class="btn btn-success mr-2"/>
<input type="reset" value="Limpiar" class="btn btn-warning mr-2"/>
<a href="profesores.php" class="btn btn-primary mr-2">Volver</a>
</div>
</form>
</div>
</body>
</html>