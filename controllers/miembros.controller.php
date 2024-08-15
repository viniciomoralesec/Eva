<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de miembros

require_once('../models/miembros.model.php');

$miembros = new Miembros;

switch ($_GET["op"]) {
        //TODO: operaciones de miembros

    case 'todos': //TODO: Procedimiento para cargar todos las datos de los miembros
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase miembros.model.php
        $datos = $miembros->todos(); // Llamo al metodo todos de la clase miembros.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->uno($miembro_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un club en la base de datos
    case 'insertar':
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        echo($nombre);
        $datos = array();
        $datos = $miembros->insertar($nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualizar un club en la base de datos
    case 'actualizar':
        $miembro_id = $_POST["miembro_id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $datos = array();
        $datos = $miembros->actualizar($miembro_id, $nombre, $apellido, $email, $telefono);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un club en la base de datos
    case 'eliminar':
        $miembro_id = $_POST["miembro_id"];
        $datos = array();
        $datos = $miembros->eliminar($miembro_id);
        echo json_encode($datos);
        break;
}