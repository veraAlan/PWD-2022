<?php

class CUsuario
{

    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idUsuario', $argument) and array_key_exists('usNombre', $argument) and array_key_exists('usPass', $argument) and array_key_exists('usMail', $argument)) {
            $object = new Usuario();
            if (array_key_exists('usDeshabilitado', $argument)) {
                $object->setear($argument["idUsuario"], $argument["usNombre"], $argument["usPass"], $argument["usMail"], $argument["usDeshabilitado"]);
            } else {
                $object->setear($argument["idUsuario"], $argument["usNombre"], $argument["usPass"], $argument["usMail"], NULL);
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idUsuario'])) {
            $object = new Usuario();
            $object->setear($argument['idUsuario'], null, null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idUsuario'])) {
            $resp = true;
        }
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idUsuario'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null && $object->Insert()) {
            if ($this->HighRol($object)) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function HighRol($object)
    {
        $idUser = $object->getIdUsuario();
        $Rol = new CUsuarioRol();
        $dataRol['idRol'] = 2;
        $dataRol['idUsuario'] = $idUser;
        $resp = $Rol->alta($dataRol);
        return $resp;
    }

    public function Low($argument)
    {
        $resp = false;
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObjectEnKey($argument);
            if ($object != null && $object->Delete()) {
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

    public function List($argument = "")
    {
        $where = "true";
        if ($argument <> NULL) {
            if (isset($argument['idUsuario']))
                $where .= " and idUsuario=" . $argument['idUsuario'];
            if (isset($argument['usNombre']))
                $where .= " and usNombre='" . $argument['usNombre'] . "'";
            if (isset($argument['usPass']))
                $where .= " and usPass='" . $argument['usPass'] . "'";
            if (isset($argument['usMail']))
                $where .= " and usMail='" . $argument['$usMail'] . "'";
        }
        $object = new Usuario();
        $array = $object->List($where);
        return $array;
    }
}
