<?php

class CCompraItem
{
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idCompraItem', $argument) and array_key_exists('idProducto', $argument) and array_key_exists('idCompra', $argument) and array_key_exists('ciCantidad', $argument)) {
            $object = new CompraItem();
            $object->setear($argument['idCompraItem'], $argument['idProducto'], $argument['idCompra'], $argument['ciCantidad']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idCompraItem'])) {
            $object = new CompraItem();
            $object->setear($argument['idCompraItem'], null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idCompraItem'])) {
            $resp = true;
        }
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idCompraItem'] = null;
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

    public function modificacion($argument)
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

    public function List($argument = "")
    {
        $where = " true ";
        if ($argument <> null) {
            if (isset($argument["idCompraItem"])) {
                $where .= " and idCompraItem =" . $argument["idCompraItem"];
            }
            if (isset($argument["idCompra"])) {
                $where .= " and idCompra =" . $argument["idCompra"];
            }
            if (isset($argument["idProducto"])) {
                $where .= " and idProducto =" . $argument["idProducto"];
            }
        }
        $object = new CompraItem();
        $array = $object->List($where);
        return $array;
    }
}
