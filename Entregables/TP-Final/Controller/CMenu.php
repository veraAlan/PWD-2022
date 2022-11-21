<?php
class CMenu
{
    public function LoadObject($argument)
    {

        $object = null;
        if (array_key_exists('idMenu', $argument) and array_key_exists('meNombre', $argument) and array_key_exists('meDescripcion', $argument)) {
            $object = new Menu();
            $objectMenu = null;
            if (isset($argument['idPadre'])) {
                $objectMenu = new Menu();
                $objectMenu->setIdmenu($argument['idpadre']);
                $objectMenu->Load();
            }
            if (!isset($argument['medeshabilitado'])) {
                $argument['medeshabilitado'] = null;
            } else {
                $argument['medeshabilitado'] = date("Y-m-d H:i:s");
            }
            $object->setear($argument['idMenu'], $argument['meNombre'], $argument['meDescripcion'], $objectMenu, $argument['meDeshabilitado']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idmenu'])) {
            $object = new Menu();
            $object->setIdmenu($argument['idmenu']);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idmenu']))
            $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idmenu'] = null;
        $argument['medeshabilitado'] = null;
        $object = $this->LoadObject($argument);

        if ($object != null and $object->Insert()) {
            $resp = true;
        }
        return $resp;
    }

    public function Drop($argument)
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
            if (isset($argument['idmenu']))
                $where .= " and idmenu =" . $argument['idmenu'];
        }

        $object = new Menu();
        $array = $object->List($where);
        return $array;
    }
}
