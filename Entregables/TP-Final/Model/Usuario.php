<?php
class Usuario
{
    private $idusuario;
    private $usnombre;
    private $uspass;
    private $usmail;
    private $usdeshabilitado;
    private $mensajeOperacion;


    public function getIdUsuario()
    {
        return $this->idusuario;
    }

    public function getUsNombre()
    {
        return $this->usnombre;
    }

    public function getUsPass()
    {
        return $this->uspass;
    }

    public function getUsMail()
    {
        return $this->usmail;
    }

    public function getUsDeshabilitado()
    {
        return $this->usdeshabilitado;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setUsNombre($usnombre)
    {
        $this->usnombre = $usnombre;
    }

    public function setUsPass($uspass)
    {
        $this->uspass = $uspass;
    }

    public function setUsMail($usmail)
    {
        $this->usmail = $usmail;
    }

    public function setUsDeshabilitado($usdeshabilitado)
    {
        $this->usdeshabilitado = $usdeshabilitado;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function __construct()
    {
        $this->idusuario = "";
        $this->usnombre = "";
        $this->uspass = "";
        $this->usmail = "";
        $this->usdeshabilitado = "";
        $this->mensajeOperacion = "";
    }

    public function setear($idusuario, $usnombre, $uspass, $usmail, $usdeshabilitado)
    {
        $this->setIdUsuario($idusuario);
        $this->setUsNombre($usnombre);
        $this->setUsPass($uspass);
        $this->setUsMail($usmail);
        $this->setUsDeshabilitado($usdeshabilitado);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        if ($this->getIdUsuario() != '') {
            $sql = "SELECT * FROM usuario WHERE idusuario = " . $this->getIdUsuario();
        }
        //echo $sql;
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
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
        $sql = "INSERT INTO usuario(usnombre,uspass,usmail)
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
        $query = "UPDATE usuario SET
        usnombre = '" . $this->getUsNombre() . "',
        uspass = '" . $this->getUsPass() . "',
        usmail = '" . $this->getUsMail();
        echo "DESHA " . $this->getUsDeshabilitado();
        if ($this->getUsDeshabilitado() != null) {
            $query .= "', usdeshabilitado = '" . $this->getUsDeshabilitado();
        }
        $query .= "' WHERE idusuario = '" . $this->getIdUsuario() . "'";



        if ($dataBase->Start()) {
            if ($dataBase->Execute($query)) {
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
        $sql = "DELETE FROM usuario WHERE idusuario=" . $this->getIdUsuario();
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

    public static function List($argument = "")
    {
        $array = null;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM usuario ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            // Funciona hasta aca.
            if ($res > 0) {
                $array = array();
                while ($row = $dataBase->Register()) {
                    $object = new Usuario();
                    $object->setear($row['idusuario'], $row['usnombre'], $row['uspass'], $row['usmail'], $row['usdeshabilitado']);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }

    public function Find($condition)
    {
        $where = " true ";
        if ($condition != NULL) {
            if (isset($condition['idusuario']))
                $where .= " and idusuario =" . $condition['idusuario'];
            if (isset($condition['usnombre']))
                $where .= " and usnombre ='" . $condition['usnombre'] . "'";
            if (isset($condition['usmail']))
                $where .= " and usmail ='" . $condition['usmail'] . "'";
            if (isset($condition['uspass']))
                $where .= " and uspass ='" . $condition['uspass'] . "'";
            if (isset($condition['usdeshabilitado']))
                $where .= " and usdeshabilitado ='" . $condition['usdeshabilitado'] . "'";
        }
        $obj = new Usuario();
        $arreglo = $obj->List($where);
        return $arreglo;
    }
}
