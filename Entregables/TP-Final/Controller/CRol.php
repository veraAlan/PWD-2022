<?php

use function Clue\StreamFilter\register;

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

    public function Register($argument)
    {
        $resp = false;
        $object = $this->LoadObject($argument);

        if ($object != null) {
            if ($argument['idrol'] == 0) {
                if ($object->Insert()) {
                    $menurol = new CMenuRol();
                    $menurol->Register(['idmenu' => $argument['idmenu'], 'idrol' => $object->getIdRol()]);
                    $resp = true;
                }
            } else {
                if (!$object->Load()) {
                    if ($object->Insert()) {
                        $resp = true;
                    }
                }
            }
        }
        return $resp;
    }

    public function Drop($argument)
    {
        $resp = false;
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObjectEnKey($argument);
            $cmenurol = new CMenuRol();
            if ($cmenurol->LoadObjectEnKey($argument)) {
                $cmenurol->Drop($argument);
            }
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
            if (isset($argument['idmenu'])) {
                $menu = new CMenuRol();
                $menu->Modify($argument);
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
            if (isset($argument['rodescripcion']))
                $where .= " and rodescripcion='" . $argument['rodescripcion'] . "'";
        }
        $object = new Rol();
        $array = $object->List($where);
        return $array;
    }
}
