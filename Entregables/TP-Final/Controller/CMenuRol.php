<?php

class CMenuRol
{

    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idrol', $argument) and array_key_exists('idRol', $argument)) {
            $object = new MenuRol();
            $objectMenu = null;
            if (isset($argument['idrol'])) {
                $objectMenu = new Menu();
                $objectMenu->setIdmenu($argument['idpadre']);
                $objectMenu->Load();
            }
            $objectRol = null;
            if (isset($argument['idRol'])) {
                $objectRol = new Rol();
                $objectRol->setIdRol($argument['idRol']);
                $objectRol->Load();
            }
            $object->setear($argument['idrol'], $argument['idRol']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        if (isset($argument['idrol'])) {
            $rol = new Rol();
            $menuR = new MenuRol();
            $rol->setIdRol($argument['idrol']);
            if ($rol->Load()) {
                $menuR->setRol($rol);
                $menuR->Load();
            } else {
                $rol->setIdRol(0);
                $menuR->setRol($rol);
                $menuR->Load();
            }
        }
        return $menuR;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idrol'], $argument['idRol']))
            $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idrol'] = null;
        $argument['idRol'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null and $object->Insert()) {
            $resp = true;
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

    public function List($argument = "")
    {
        $where = " true ";
        if ($argument != null) {
            if (isset($argument['idrol']))
                $where .= " and idrol =" . $argument['idrol'];
            if (isset($argument['idRol']))
                $where .= " and idrol =" . $argument['idRol'];
        }
        $object = new MenuRol();
        $array = $object->List($where);
        return $array;
    }
}
