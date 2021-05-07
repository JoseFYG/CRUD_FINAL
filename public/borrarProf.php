<?php

require "../vendor/autoload.php";

use Clases\Profesores;

$departamento=new Profesores();
$departamento->setId($_POST['id']);
$departamento->delete();
$departamento=null;

header(("Location:profesores.php"));