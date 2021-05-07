<?php

require "../vendor/autoload.php";

use Clases\Departamentos;

$departamento=new Departamentos();
$departamento->setId($_POST['id']);
$departamento->delete();
$departamento=null;

header(("Location:departamentos.php"));