<?php

class CMenuRol
{

    public function LoadObject($argument)
    {
        if (array_key_exists('idrol', $argument) and array_key_exists('idmenu', $argument)) {
            $object = new MenuRol();
            $objectMenu = new Menu();
            $objectRol = new Rol();
            if (isset($argument['idmenu'])) {
                $objectMenu->setIdmenu($argument['idmenu']);
                $objectMenu->Load();
            }
            if (isset($argument['idrol'])) {
                $objectRol->setIdRol($argument['idrol']);
                $objectRol->Load();
            }
            $object->setear($objectMenu, $objectRol);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $menuR = new MenuRol();
        if (isset($argument['idrol'])) {
            $rol = new Rol();
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

    public function Register($argument)
    {
        $resp = false;
        $object = $this->LoadObject($argument);
        if ($object != null and $object->Insert()) {
            $resp = true;
        }
        return $resp;
    }

    public function Drop($argument)
    {
        $resp = false;
        $object = $this->LoadObjectEnKey($argument);
        if ($object != null and $object->Delete()) {
            $resp = true;
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
            if (isset($argument['idmenu']))
                $where .= " and idmenu =" . $argument['idmenu'];
        }
        $object = new MenuRol();
        $array = $object->List($where);
        return $array;
    }
}
