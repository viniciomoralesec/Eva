<?php
//TODO: Clase de Clubes
require_once('../config/config.php');
class Clubes
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from Clubes
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Clubes`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($club_id) //select * from Clubes where club_id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Clubes` WHERE `club_id`=$club_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $deporte, $ubicacion, $fecha_fundacion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Clubes` ( `nombre`, `deporte`, `ubicacion`, `fecha_fundacion`) VALUES ('$nombre','$deporte','$ubicacion','$fecha_fundacion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($club_id, $nombre, $deporte, $ubicacion, $fecha_fundacion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Clubes` SET `nombre`='$nombre',`deporte`='$deporte',`ubicacion`='$ubicacion',`fecha_fundacion`='$fecha_fundacion' WHERE `club_id` = $club_id";
            if (mysqli_query($con, $cadena)) {
                return $club_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($club_id) //delete from Clubes where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Clubes` WHERE `club_id`= $club_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}