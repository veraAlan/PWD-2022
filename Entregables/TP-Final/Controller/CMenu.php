<?php
class CMenu
{
    public function LoadObject($data)
    {
        $object = new Menu();
        if (array_key_exists('idmenu', $data)) {
            $object->setIdMenu($data['idmenu']);
            $object->Load();
            foreach ($data as $key => $value) {
                echo "HERE" . $key;
                if ($value != "null") {
                    switch ($key) {
                        case 'menombre':
                            $object->setMeNombre($value);
                            break;
                        case 'medescripcion':
                            $object->setMeDescripcion($value);
                            break;
                        case 'idpadre':
                            $padreMenu = new Menu();
                            $padreMenu->setIdmenu($value);
                            $padreMenu->Load();

                            $object->setPadre($padreMenu);
                            break;
                        case 'medeshabilitado':
                            echo "Here happened";
                            $object->setMeDeshabilitado($value);
                            break;
                    }
                }
            }
        }

        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = new Menu();
        if (isset($argument['idmenu'])) {
            $object->setIdmenu($argument['idmenu']);
            $object->Load();
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
        $object = $this->LoadObject($argument);
        if ($object != null and $object->Modify()) {
            $resp = true;
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
