<?php

class CCompraItem
{
    public function LoadObject($argument)
    {
        $object = new CompraItem();
        if (array_key_exists('idcompraitem', $argument) and array_key_exists('idproducto', $argument) and array_key_exists('idCompra', $argument) and array_key_exists('ciCantidad', $argument)) {
            $object->setear($argument['idcompraitem'], $argument['idproducto'], $argument['idCompra'], $argument['ciCantidad']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = new CompraItem();
        if (isset($argument['idcompra'])) {
            $object->setIdCompraItem($argument['idcompra']);
            $object->Load();
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idcompraitem'])) {
            $resp = true;
        }
        return $resp;
    }

    public function Register($argument)
    {
        $resp = false;
        $argument['idcompraitem'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null) {
            if ($object->Insert()) {
                $resp = true;
            }
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
            if (isset($argument["idcompraitem"])) {
                $where .= " and idcompraitem =" . $argument["idcompraitem"];
            }
            if (isset($argument["idcompra"])) {
                $where .= " and idcompra =" . $argument["idcompra"];
            }
            if (isset($argument["idproducto"])) {
                $where .= " and idproducto =" . $argument["idproducto"];
            }
        }
        $object = new CompraItem();
        $array = $object->List($where);
        return $array;
    }
}
