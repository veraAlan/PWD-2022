<?php

class CCompra
{
    public function LoadObject($argument)
    {
        $object = null;
        if (array_key_exists('idcompra', $argument) and array_key_exists('coFecha', $argument) and array_key_exists('idusuario', $argument)) {
            $object = new Compra();
            if (!$object->setear($argument['idcompra'], $argument['coFecha'], $argument['idusuario'])) {
                $object = null;
            }
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idcompra'])) {
            $object = new Compra();
            $object->setear($argument['idcompra'], null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idcompra'])) {
            $resp = true;
        }
        return $resp;
    }

    public function Register($argument)
    {
        $resp = false;
        $argument['idcompra'] = null;
        $argument['coFecha'] = "CURRENT_TIMESTAMP";
        $object = $this->LoadObject($argument);
        if ($object != null) {
            if ($object->Insert()) {
                $resp = true;
            }
        }
        return $resp;
    }

    public function Unenroll($argument)
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
            if (isset($argument["idcompra"])) {
                $where .= " and idcompra = " . $argument["idcompra"];
            }
            if (isset($argument["idusuario"])) {
                $where .= " and idusuario = " . $argument["idusuario"];
            }
        }
        $object = new Compra();
        $array = $object->List($where);
        return $array;
    }
}
