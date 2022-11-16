<?php
class CSession
{

    private $objectUser;

    //Getters
    public function getObjectUser()
    {
        return $this->objectUser;
    }

    //Setters
    public function setObjectUser($objectUser)
    {
        $this->objectUser = $objectUser;
    }

    public function __construct()
    {
        session_start();
        $this->objectUser = new CUsuario();
        if (isset($_SESSION["nombreUsuario"])) {
            $user = $this->getObjectUser()->List($_SESSION["nombreUsuario"]);
            $this->setObjectUser($user[0]);
        }
    }

    public function Start($userName, $arrayRol)
    {
        $_SESSION["nombreUsuario"] = $userName;
        $_SESSION["roles"] = $arrayRol;
    }

    public function Check($argument)
    {
        $arrayUser = $this->getObjectUser()->List($argument);
        $resp = false;
        if ($arrayUser != null) {
            if ($argument["usPass"] == $arrayUser[0]->getUsPass()) {
                $this->setObjectUser($arrayUser[0]);
                $arrayRol = [];
                $arrayObjectUR = $this->getRol();
                foreach ($arrayObjectUR as $rol) {
                    array_push($arrayRol, $rol->getRol());
                }
                $idRol = [];
                foreach ($arrayRol as $objRol) {
                    array_push($idRol, $objRol->getIdRol());
                }
                $this->Start($argument["usNombre"], $idRol);
                $resp = true;
            }
        }
        return $resp;
    }

    public function activo()
    {
        $resp = isset($_SESSION["nombreUsuario"]) ? TRUE : FALSE;
        return $resp;
    }

    public function getUser()
    {
        $resp = null;
        if ($this->getObjectUser() != null) {
            $resp = $this->getObjectUser();
        }
        return $resp;
    }

    public function getRol()
    {
        if ($this->getObjectUser() != null) {
            $objectUR = new CUsuarioRol();
            $argument["idUsuario"] = $this->getObjectUser()->getIdUsuario();
            $arrayRolUser = $objectUR->List($argument);
        }
        return $arrayRolUser;
    }

    public function Destroy()
    {
        $destroy = false;
        if (session_destroy()) {
            $destroy = true;
        }
        return $destroy;
    }
}
