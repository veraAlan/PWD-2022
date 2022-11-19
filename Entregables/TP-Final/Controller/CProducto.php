<?php

class CProducto
{
    public function LoadObject($data)
    {
        if (array_key_exists('idproducto', $data)) {
            $object = new Producto();
            $object->setIdProducto($data['idproducto']);
            $object->Load();
            foreach ($data as $key => $value) {
                if ($value != "null") {
                    switch ($key) {
                        case 'pronombre':
                            $object->setNombre($value);
                            break;
                        case 'prodetalle':
                            $object->setDetalle($value);
                            break;
                        case 'procantstock':
                            $object->setCantStock($value);
                            break;
                        case 'prorecio':
                            $object->setProPrecio($value);
                            break;
                        case 'urlimage':
                            $object->setUrlImagen($value);
                            break;
                    }
                }
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = new Producto();
        if (isset($argument['idproducto'])) {
            $object->setIdProducto($argument['idproducto']);
            $object->Load();
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idproducto'])) {
            $resp = true;
        }
        return $resp;
    }

    public function Register($argument)
    {
        $resp = false;
        $argument['idproducto'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null) {
            if ($object->Insert()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function Dispatch($argument)
    {
        $resp = false;
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObject($argument);
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
        $where = "true";
        if ($argument <> null) {
            if (isset($argument)) {
                $where .= " and idproducto ='" . $argument["idproducto"] . "'";
            }
        }
        $object = new Producto();
        $array = $object->List($where);
        return $array;
    }
}
