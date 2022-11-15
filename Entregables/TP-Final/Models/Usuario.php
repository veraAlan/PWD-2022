<?php
class Usuario
{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDeshabilitado;
    private $mensajeOperacion;


    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getUsNombre()
    {
        return $this->usNombre;
    }

    public function getUsPass()
    {
        return $this->usPass;
    }

    public function getUsMail()
    {
        return $this->usMail;
    }

    public function getUsDeshabilitado()
    {
        return $this->usDeshabilitado;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setUsNombre($usNombre)
    {
        $this->usNombre = $usNombre;
    }

    public function setUsPass($usPass)
    {
        $this->usPass = $usPass;
    }

    public function setUsMail($usMail)
    {
        $this->usMail = $usMail;
    }

    public function setUsDeshabilitado($usDeshabilitado)
    {
        $this->usDeshabilitado = $usDeshabilitado;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function __construct()
    {
        $this->idUsuario = "";
        $this->usNombre = "";
        $this->usPass = "";
        $this->usMail = "";
        $this->usDeshabilitado = "";
        $this->mensajeOperacion = "";
    }

    public function setear($idUsuario, $usNombre, $usPass, $usMail, $usDeshabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDeshabilitado($usDeshabilitado);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        if ($this->getIdUsuario() != '') {
            $sql = "SELECT * FROM usuario WHERE idUsuario = " . $this->getIdUsuario();
        }
        //echo $sql;
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("usuario->List: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO usuario(usNombre,usPass,usMail)
                VALUES('" . $this->getUsNombre() . "','"
            . $this->getUsPass() . "','"
            . $this->getUsMail() . "');";
        if ($dataBase->Start()) {
            if ($elid = $dataBase->Execute($sql)) {
                $this->setIdUsuario($elid);
                $resp = true;
            } else {
                $this->setMensajeOperacion("usuario->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuario->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $deshabilitado = $this->getUsDeshabilitado();
        if ($deshabilitado == null) {
            $deshabilitado == '';
        } else if ($deshabilitado == 'habilitar') {
            $deshabilitado = ",usDeshabilitado=NULL";
        } else {
            $deshabilitado = ",usDeshabilitado='" . $this->getUsDeshabilitado() . "' ";
        }
        $sql = "UPDATE usuario SET usNombre='" . $this->getUsNombre() . "',
        usPass='" . $this->getUsPass() . "',
        usMail='" . $this->getUsMail() . "' $deshabilitado
        WHERE idUsuario=" . $this->getIdUsuario();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("usuario->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuario->Modify: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM usuario WHERE idUsuario=" . $this->getIdUsuario();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("usuario->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuario->Delete: " . $dataBase->getError());
        }
        return $resp;
    }

    public static function listar($argument = "")
    {
        $array = null;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM usuario ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {
                $array = array();
                while ($row = $dataBase->Register()) {
                    $object = new Usuario();
                    $object->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDeshabilitado']);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }
}
