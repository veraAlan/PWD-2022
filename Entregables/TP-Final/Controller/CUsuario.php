<?php

class CUsuario
{
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idusuario', $argument) and array_key_exists('usnombre', $argument) and array_key_exists('uspass', $argument) and array_key_exists('usmail', $argument)) {
            $object = new Usuario();
            if (array_key_exists('usdeshabilitado', $argument)) {
                $object->setear($argument["idusuario"], $argument["usnombre"], $argument["uspass"], $argument["usmail"], $argument["usdeshabilitado"]);
            } else {
                $object->setear($argument["idusuario"], $argument["usnombre"], $argument["uspass"], $argument["usmail"], NULL);
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['usmail'])) {
            $object = new Usuario();
            $object->setear(null, null, null, $argument['usmail'], null);
        } else if (isset($argument['idusuario'])) {
            $object = new Usuario();
            $object->setear($argument['idusuario'], null, null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idusuario'])) {
            $resp = true;
        }
        return $resp;
    }

    public function Register($argument)
    {
        $resp = false;
        $argument['idusuario'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null && $object->Insert()) {
            if ($this->RegisterRole($object)) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function RegisterRole($object)
    {
        $idUser = $object->getIdUsuario();
        $Rol = new UsuarioRol();
        $dataRol['idRol'] = 2;
        $dataRol['idusuario'] = $idUser;
        $resp = $Rol->Insert($dataRol);
        return $resp;
    }

    public function Drop($argument)
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
            if (isset($argument['idusuario']))
                $where .= " and idusuario=" . $argument['idusuario'];
            if (isset($argument['usnombre']))
                $where .= " and usnombre='" . $argument['usnombre'] . "'";
            if (isset($argument['uspass']))
                $where .= " and uspass='" . $argument['uspass'] . "'";
            if (isset($argument['usEmail']))
                $where .= " and usEmail='" . $argument['$usEmail'] . "'";
        }
        $object = new Usuario();
        $array = $object->List($where);
        return $array;
    }
}
