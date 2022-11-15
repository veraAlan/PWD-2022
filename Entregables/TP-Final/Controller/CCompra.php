<?php

class CCompra
{
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idCompra', $argument) and array_key_exists('coFecha', $argument) and array_key_exists('idUsuario', $argument)) {
            $object = new Compra();
            if (!$object->setear($argument['idCompra'], $argument['coFecha'], $argument['idUsuario'])) {
                $object = null;
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idCompra'])) {
            $object = new Compra();
            $object->setear($argument['idCompra'], null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idCompra'])) {
            $resp = true;
        }
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idCompra'] = null;
        $argument['coFecha'] = "CURRENT_TIMESTAMP";
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
        $where = " true ";
        if ($argument <> null) {
            if (isset($argument["idCompra"])) {
                $where .= " and idCompra =" . $argument["idCompra"];
            }
            if (isset($argument["idUsuario"])) {
                $where .= " and idUsuario =" . $argument["idUsuario"];
            }
        }
        $object = new Compra();
        $array = $object->List($where);
        return $array;
    }
}
