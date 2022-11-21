<?php
class UsuarioRol
{
    private $rol;
    private $usuario;
    private $mensajeOperacion;


    public function getRol()
    {
        return $this->rol;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->rol = new Rol();
        $this->mensajeOperacion = "";
    }

    public function setear($usuario, $rol)
    {
        $this->setRol($rol);
        $this->setUsuario($usuario);
    }

    public function SetearEnKey($idusuario)
    {
        $usuario = new Usuario();
        $usuario->setIdUsuario($idusuario);
        $this->setUsuario($usuario);
    }


    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM usuariorol WHERE idusuario = "
            . $this->getUsuario()->getIdUsuario() . "";

        if ($this->getRol()->getIdRol() != null) {
            $sql .= " and idrol = " . $this->getRol()->getIdRol();
        }

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdUsuario($row['idusuario']);
                        $objUsuario->Load();
                    }
                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->Load();
                    }
                    $resp = true;
                    $this->setear($objUsuario, $objRol);
                }
            }
        } else {
            $this->setMensajeOperacion("usuariorol->List: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO usuariorol (idusuario,idrol)  VALUES ("
            . $this->getUsuario()->getIdUsuario() . ","
            . $this->getRol()->getIdRol() . ")";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("usuariorol->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuariorol->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    /**
     * Modifies values of the table UsuarioRol in the database.
     */
    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $query = "UPDATE usuariorol SET
        idrol = " . $this->getRol()->getIdRol();
        $query .= " WHERE idusuario = " . $this->getUsuario()->getIdUsuario() . ";";

        if ($this->getRol()->getIdRol() != null) {
            $query .= " and idrol = " . $this->getRol()->getIdRol();
        }

        if ($dataBase->Start()) {
            if ($dataBase->Execute($query)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("UsuarioRol->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("UsuarioRol->Modify: " . $dataBase->getError());
        }

        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM usuariorol WHERE idusuario = "
            . $this->getUsuario()->getIdUsuario();

        if ($this->getRol()->getIdRol() != null) {
            $sql .= " and idrol = " . $this->getRol()->getIdRol();
        }

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                return true;
            } else {
                $this->setMensajeOperacion("usuariorol->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuariorol->Delete: " . $dataBase->getError());
        }
        return $resp;
    }

    public static function List($argument = "")
    {
        $array = array();
        $dataBase = new DataBase();
        $consultasql = "SELECT * FROM usuariorol ";

        if ($argument != "") {
            $consultasql .= 'WHERE ' . $argument;
        }

        $res = $dataBase->Execute($consultasql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $dataBase->Register()) {
                    $objUsuario = NULL;
                    if ($row['idusuario'] != null) {
                        $objUsuario = new Usuario();
                        $objUsuario->setIdUsuario($row['idusuario']);
                        $objUsuario->Load();
                    }
                    $objRol = NULL;
                    if ($row['idrol'] != null) {
                        $objRol = new Rol();
                        $objRol->setIdRol($row['idrol']);
                        $objRol->Load();
                    }
                    $object = new UsuarioRol();
                    $object->setear($objUsuario, $objRol);
                    $object->Load();
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }
}
