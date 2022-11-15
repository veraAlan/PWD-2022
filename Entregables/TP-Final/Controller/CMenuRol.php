<?php

class CMenuRol
{

    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idMenu', $argument) and array_key_exists('idRol', $argument)) {
            $object = new MenuRol();
            $objectMenu = null;
            if (isset($argument['idMenu'])) {
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
            $object->setear($argument['idMenu'], $argument['idRol']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idMenu'])) {
            $object = new MenuRol();
            $object->setear($argument['idMenu'], null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idMenu'], $argument['idRol']))
            $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idMenu'] = null;
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
            if (isset($argument['idMenu']))
                $where .= " and idMenu =" . $argument['idMenu'];
            if (isset($argument['idRol']))
                $where .= " and idRol =" . $argument['idRol'];
        }
        $object = new MenuRol();
        $array = $object->List($where);
        return $array;
    }
}
