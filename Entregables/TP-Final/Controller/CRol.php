<?php
class CRol
{
    // FIXME Corregir esta funcion
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idrol', $argument) and array_key_exists('roldescripcion', $argument)) {
            $object = new Rol();
            $object->Load(
                $argument['idrol'],
                $argument['roldescripcion'],
            );
        }
        return $object;
    }

    // FIXME Corregir esta funcion
    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idrol'])) {
            $object = new Rol();
            $object->setear($argument['idrol'], null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idrol'])) {
            $resp = true;
            return $resp;
        }
    }

    // FIXME Corregir esta funcion
    public function Register($argument)
    {
        $resp = false;
        $argument['idrol'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null && $object->Insert()) {
            $resp = true;
        }
        return $resp;
    }

    // FIXME Corregir esta funcion
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
            if (isset($argument['idrol']))
                $where .= " and idrol=" . $argument['idrol'];
            if (isset($argument['roldescripcion']))
                $where .= " and roldescripcion='" . $argument['roldescripcion'] . "'";
        }
        $object = new Rol();
        $array = $object->List($where);
        return $array;
    }
}
