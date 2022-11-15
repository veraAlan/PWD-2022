<?php
class Rol
{
    private $idRol;
    private $rolDescripcion;
    private $mensajeOperacion;


    public function getIdRol()
    {
        return $this->idRol;
    }

    public function getRolDescripcion()
    {
        return $this->rolDescripcion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    public function setRolDescripcion($rolDescripcion)
    {
        $this->rolDescripcion = $rolDescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function __construct()
    {
        $this->idRol = "";
        $this->rolDescripcion = "";
    }


    public function setear($idRol, $rolDescripcion)
    {
        $this->setIdRol($idRol);
        $this->setRolDescripcion($rolDescripcion);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM rol WHERE idRol = " . $this->getIdrol();
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idRol'], $row['rolDescripcion']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("rol->List: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO rol(idRol,rolDescripcion)  VALUES('" . $this->getIdrol() . "','" . $this->getRolDescripcion() . "');";
        if ($dataBase->Start()) {
            if ($elid = $dataBase->Execute($sql)) {
                $this->setIdRol($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("rol->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("rol->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "UPDATE rol SET rolDescripcion='" . $this->getRolDescripcion() . "'
        WHERE idRol=" . $this->getIdRol();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("rol->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("rol->Modify: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM rol WHERE idRol=" . $this->getIdRol();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("rol->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("rol->Delete: " . $dataBase->getError());
        }
        return $resp;
    }

    public static function List($argument = "")
    {
        $array = array();
        $dataBase = new DataBase();
        $sql = "SELECT * FROM rol ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $dataBase->Register()) {
                    $object = new Rol();
                    $object->setear($row['idRol'], $row['rolDescripcion']);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }

    function __toString()
    {
        return $this->getRolDescripcion();
    }
}
