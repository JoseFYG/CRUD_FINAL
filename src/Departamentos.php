<?php
namespace Clases;
use Clases\Conexion;
use PDOException;
use PDO;
class Departamentos extends Conexion{

private $id;
private $nombre;

public function __construct()
{
    parent::__construct();
}

//CRUD
public function create(){
    $consulta="insert into departamentos(nom_dep) values(:n)";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':n'=>$this->nombre
        ]);
    }catch(PDOException $ex){
        die("Error al insertar un departamento: ".$ex->getMessage());
    }
}
public function read(){
    $consulta="select * from departamentos where id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([':i' => $this->id]);
    } catch (PDOException $ex) {
        die("Error al leer un departamento: " . $ex->getMessage());
    }
    return $stmt;
}
public function update(){
    $consulta="update departamentos set nom_dep=:n where id=:i";
    $stmt = parent::$conexion->prepare($consulta);
    try {
        $stmt->execute([
            ':i' => $this->id,
            ':n' => $this->nombre
        ]);
    } catch (PDOException $ex) {
        die("Error al actualizar departamento: " . $ex->getMessage());
    }
}
public function delete(){
    $consulta="delete from departamentos where id=:i";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':i'=>$this->id
        ]);
    }catch(PDOException $ex){
        die("Error al borrar el departamento: ".$ex->getMessage());
    }
}

public function devolverTodo(){
    $consulta="select * from departamentos order by id";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute();
    }catch(PDOException $ex){
        die("Error al devolver departamentos: ".$ex->getMessage());
    }
    return $stmt;
}

public function comprobarDepartamento($departamento){
    $consulta="select * from departamentos where nom_dep=:n";
    $stmt=parent::$conexion->prepare($consulta);
    try{
        $stmt->execute([
            ':n'=>$departamento
        ]);
    }catch(PDOException $ex){
        die("Error al comprobar departamento: ".$ex->getMessage());
    }
    $fila=$stmt->fetch(PDO::FETCH_OBJ);
    return ($fila==null) ? true : false;
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
}