<?php
class CSession
{
    public function __construct()
    {
    }

    private $objectUser;

    // Getters
    public function getObjectUser()
    {
        return $this->objectUser;
    }

    // Setters
    public function setObjectUser($objectUser)
    {
        $this->objectUser = $objectUser;
    }

    public function Start($userEmail, $userPass)
    {
        echo "<h4>Starting...</h4>";
        $resp = false;
        $objusuario = new Usuario();
        $param['usmail'] = $userEmail;

        $resultado = $objusuario->Find($param);
        // Funciona hasta aca.
        if ($resultado != null) {
            echo "<h4>Obj usuario creado</h4>";
            $usuario = $resultado[0];
            print_r($usuario);
            $resp = true;
            if ($usuario->getUser() == $userPass) {
                echo "<h4>Pass correcta</h4>";
                $_SESSION['idusuario'] = $usuario->getidusuario();
                $_SESSION['idrol'] = $usuario->getidrol();
                $resp = true;
            } else {
                $this->Destroy();
            }
        } else {
            $this->Destroy();
        }
        return $resp;
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
        $resp = false;
        if (php_sapi_name() !== 'cli') {
            if (version_compare(phpversion(), '5.4.0', '>=')) {
                $resp = session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                $resp = session_id() === '' ? FALSE : TRUE;
            }
        }
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
        if (!session_status()) {
            session_destroy();
        }

        return true;
    }
}
