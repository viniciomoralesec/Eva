<?php
//TODO: Clase de Inscripciones
require_once('../config/config.php');
class Inscripciones
{
    //TODO: Implementar los metodos de la clase

    public function todos() //select * from Inscripciones
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Inscripciones`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($Inscripcion_id) //select * from Inscripciones where Inscripcion_id = $id
    {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Inscripciones` WHERE `Inscripcion_id`=$Inscripcion_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($Clubes_club_id, $Miembros_miembro_id, $detalle, $fecha_inscripcion)
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Inscripciones` ( `Clubes_club_id`, `Miembros_miembro_id`, `detalle`, `fecha_inscripcion`) VALUES ('$Clubes_club_id','$Miembros_miembro_id','$detalle','$fecha_inscripcion')";
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
    public function actualizar($Inscripcion_id, $Clubes_club_id, $Miembros_miembro_id, $detalle, $fecha_inscripcion) 
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Inscripciones` SET `Clubes_club_id`='$Clubes_club_id',`Miembros_miembro_id`='$Miembros_miembro_id',`detalle`='$detalle',`fecha_inscripcion`='$fecha_inscripcion' WHERE `Inscripcion_id` = $Inscripcion_id";
            if (mysqli_query($con, $cadena)) {
                return $Inscripcion_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function eliminar($Inscripcion_id) //delete from Inscripciones where id = $id
    {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Inscripciones` WHERE `Inscripcion_id`= $Inscripcion_id";
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