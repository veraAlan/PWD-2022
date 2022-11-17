<?php
class Rol
{
    private $idrol;
    private $roldescripcion;
    private $mensajeOperacion;


    public function getIdRol()
    {
        return $this->idrol;
    }

    public function getRolDescripcion()
    {
        return $this->roldescripcion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setIdRol($idrol)
    {
        $this->idrol = $idrol;
    }

    public function setRolDescripcion($roldescripcion)
    {
        $this->roldescripcion = $roldescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function __construct()
    {
        $this->idrol = "";
        $this->roldescripcion = "";
    }


    public function setear($idrol, $roldescripcion)
    {
        $this->setIdRol($idrol);
        $this->setRolDescripcion($roldescripcion);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM rol WHERE idrol = " . $this->getIdrol();
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idrol'], $row['rodescripcion']);
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
        $sql = "INSERT INTO rol(idrol,rodescripcion)  VALUES('" . $this->getIdrol() . "','" . $this->getRolDescripcion() . "');";
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
        $sql = "UPDATE rol SET rodescripcion='" . $this->getRolDescripcion() . "'
        WHERE idrol=" . $this->getIdRol();
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
        $sql = "DELETE FROM rol WHERE idrol=" . $this->getIdRol();
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
                    $object->setear($row['idrol'], $row['rodescripcion']);
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
