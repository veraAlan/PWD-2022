<?php

class CUsuarioRol
{

    public function LoadObject($argument)
    {
        $objectUserRol = null;
        $objectRol = null;
        $objectUser = null;
        if (array_key_exists('idRol', $argument) && array_key_exists('idUsuario', $argument)) {
            $objectRol = new Rol();
            $objectRol->setIdRol($argument['idRol']);
            $objectUser = new Usuario();
            $objectUser->setIdUsuario($argument['idUsuario']);
            $objectUserRol = new UsuarioRol();
            $objectUserRol->setear($objectUser, $objectRol);
        }
        return $objectUserRol;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idUsuario']) && isset($argument['idRol'])) {
            $object = new UsuarioRol();
            $object->setear($argument['idUsuario'], $argument['idRol']);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idUsuario']) && isset($argument['idRol']));
        $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $object = $this->LoadObject($argument);
        if ($object != null) {
            if ($object->Insert()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function Low($argument)
    {
        $resp = false;
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObjectEnKey($argument);
            if ($object != null and $object->Delete()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function Modify($argument)
    {
        $resp = false;
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObject($argument);
            if ($object != null and $object->Modify()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function List($argument)
    {
        $where = " true ";
        if ($argument <> NULL) {
            if (isset($argument['idUsuario']))
                $where .= " and idUsuario='" . $argument['idUsuario'] . "'";
            if (isset($argument['idRol']))
                $where .= " and idRol ='" . $argument['idRol'] . "'";
        }
        $array = UsuarioRol::List($where, "");
        return $array;
    }
}
