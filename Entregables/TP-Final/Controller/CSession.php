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
        $resp = false;
        $objusuario = new Usuario();
        $param['usmail'] = $userEmail;

        $resultado = $objusuario->Find($param);
        if ($resultado != null) {
            $usuario = $resultado[0];
            if ($usuario->getUsPass() == $userPass) {
                $_SESSION['idusuario'] = $usuario->getIdUsuario();

                $objRol = new UsuarioRol();
                $objRol->SetearEnKey($usuario->getIdUsuario(), null);
                $objRol->Load();
                $_SESSION['idrol'] = $objRol->getRol()->getIdRol();
                $resp = true;
            } else {
                $this->Destroy();
            }
        } else {
            $this->Destroy();
        }
        return $resp;
    }

    public function Check()
    {
        $resp = false;
        if ($this->Active() && isset($_SESSION['idusuario']))
            $resp = true;
        return $resp;
    }

    public function Active()
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
        if ($_SESSION['idusuario'] != 0) {
            session_destroy();
        }

        return true;
    }
}
