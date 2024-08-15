<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER["REQUEST_METHOD"];
if ($method == "OPTIONS") {
    die();
}
//TODO: controlador de Inscripciones

require_once('../models/Inscripciones.model.php');

$Inscripciones = new Inscripciones;

switch ($_GET["op"]) {
        //TODO: operaciones de Inscripciones

    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los Inscripciones
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase Inscripciones.model.php
        $datos = $Inscripciones->todos(); // Llamo al metodo todos de la clase Inscripciones.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $club_id = $_POST["club_id"];
        $datos = array();
        $datos = $Inscripciones->uno($club_id);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un club en la base de datos
    case 'insertar':
        $Clubes_club_id = $_POST["Clubes_club_id"];
        $Miembros_miembro_id = $_POST["Miembros_miembro_id"];
        $detalle = $_POST["detalle"];
        $fecha_inscripcion = $_POST["fecha_inscripcion"];

        $datos = array();
        $datos = $Inscripciones->insertar($Clubes_club_id, $Miembros_miembro_id, $detalle, $fecha_inscripcion);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualizar un club en la base de datos
    case 'actualizar':
        $club_id = $_POST["club_id"];
        $Clubes_club_id = $_POST["Clubes_club_id"];
        $Miembros_miembro_id = $_POST["Miembros_miembro_id"];
        $detalle = $_POST["detalle"];
        $fecha_inscripcion = $_POST["fecha_inscripcion"];
        $datos = array();
        $datos = $Inscripciones->actualizar($club_id, $Clubes_club_id, $Miembros_miembro_id, $detalle, $fecha_inscripcion);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un club en la base de datos
    case 'eliminar':
        $club_id = $_POST["club_id"];
        $datos = array();
        $datos = $Inscripciones->eliminar($club_id);
        echo json_encode($datos);
        break;
}