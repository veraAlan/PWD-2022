<?php
class CRol
{

    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idRol', $argument) and array_key_exists('rolDescripcion', $argument)) {
            $object = new Rol();
            $object->Load(
                $argument['idRol'],
                $argument['rolDescripcion'],
            );
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idRol'])) {
            $object = new Rol();
            $object->setear($argument['idRol'], null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idRol'])) {
            $resp = true;
            return $resp;
        }
    }

    public function Register($argument)
    {
        $resp = false;
        $argument['idRol'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null && $object->Insert()) {
            $resp = true;
        }
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
            if (isset($argument['idRol']))
                $where .= " and idrol=" . $argument['idRol'];
            if (isset($argument['rolDescripcion']))
                $where .= " and roldescripcion='" . $argument['rolDescripcion'] . "'";
        }
        $object = new Usuario();
        $array = $object->List($where);
        return $array;
    }
}
