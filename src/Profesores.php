<?php
namespace Clases;
use Clases\Conexion;
use PDOException;
use PDO;
class Profesores extends Conexion{

private $id;
private $nombre;
private $sueldo;
private $fecha;
private $idDep;

public function __construct()
{
    parent::__construct();
}

//CRUD
public function create(){
    $consulta="insert into profesores(nom_prof, sueldo, fecha_prof, dep) values(:n, :s, :f, :id)";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':n'=>$this->nombre,
            ':s'=>$this->sueldo,
            ':f'=>$this->fecha,
            ':id'=>$this->idDep
        ]);
    }catch(PDOException $ex){
        die("Error al insertar un profesor: ".$ex->getMessage());
    }
}
public function read(){
    $consulta="select profesores.*, nom_dep from profesores, departamentos where profesores.dep=departamentos.id AND profesores.id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([':i' => $this->id]);
    } catch (PDOException $ex) {
        die("Error al leer un profesor: " . $ex->getMessage());
    }
    return $stmt;
}
public function update(){
    $consulta="update profesores set nom_prof=:n, sueldo=:s, fecha_prof=:f, dep=:d where id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([
            ':i' => $this->id,
            ':n' => $this->nombre,
            ':s' => $this->sueldo,
            ':f' => $this->fecha_prof,
            ':d' => $this->dep
        ]);
    } catch (PDOException $ex) {
        die("Error al actualizar profesor: " . $ex->getMessage());
    }
}
public function delete(){
    $consulta="delete from profesores where id=:i";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':i'=>$this->id
        ]);
    }catch(PDOException $ex){
        die("Error al borrar el profesor: ".$ex->getMessage());
    }
}

public function devolverTodo(){
    $consulta="select profesores.*, nom_dep from profesores, departamentos where profesores.dep=departamentos.id order by nom_dep, nom_prof";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute();
    }catch(PDOException $ex){
        die("Error al devolver profesores: ".$ex->getMessage());
    }
    return $stmt;
}

//---------------

public function getId()
{
return $this->id;
}

public function setId($id)
{
$this->id = $id;

return $this;
}

public function getNombre()
{
return $this->nombre;
}

public function setNombre($nombre)
{
$this->nombre = $nombre;

return $this;
}

public function getSueldo()
{
return $this->sueldo;
}

public function setSueldo($sueldo)
{
$this->sueldo = $sueldo;

return $this;
}

public function getFecha()
{
return $this->fecha;
}

public function setFecha($fecha)
{
$this->fecha = $fecha;

return $this;
}

public function getIdDep()
{
return $this->idDep;
}

public function setIdDep($idDep)
{
$this->idDep = $idDep;

return $this;
}
}