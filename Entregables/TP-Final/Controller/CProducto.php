<?php

class CProducto
{
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idProducto', $argument) and array_key_exists('proNombre', $argument) and array_key_exists('proDetalle', $argument) and array_key_exists('proCantStock', $argument) and  array_key_exists('proPrecio', $argument) and array_key_exists('urlImagen', $argument)) {
            $object = new Producto();
            $object->setear($argument['idProducto'], $argument['proNombre'], $argument['proDetalle'], $argument['proCantStock'], $argument['proPrecio'], $argument['urlImagen']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idProducto'])) {
            $object = new Producto();
            $object->setear($argument['idProducto'], null, null, null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idProducto'])) {
            $resp = true;
        }
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idProducto'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null) {
            if ($object->Insert()) {
                $resp = true;
            }
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
        $where = "true";
        if ($argument <> null) {
            if (isset($argument)) {
                $where .= " and idproducto ='" . $argument["idProducto"] . "'";
            }
        }
        $object = new Producto();
        $array = $object->List($where);
        return $array;
    }
}
