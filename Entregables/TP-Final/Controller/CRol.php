<?php
class CRol
{
    public function LoadObject($argument)
    {
        $object = new Rol();
        if (array_key_exists('idrol', $argument) and array_key_exists('rodescripcion', $argument)) {
            if ($argument['idrol'] == 0) {
                $object->setRolDescripcion($argument['rodescripcion']);
            } else {
                $object->setear(
                    $argument['idrol'],
                    $argument['rodescripcion'],
                );
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = new Rol();
        if (isset($argument['idrol'])) {
            $object->setIdRol($argument['idrol']);
            $object->Load();
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

        $object = $this->LoadObject($argument);

        if ($object != null && !$object->Load()) {
            if ($object->Insert()) {
                $resp = true;
            }
        }
        return $resp;
    }

    // FIXME Corregir esta funcion
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
