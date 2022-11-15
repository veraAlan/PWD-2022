<?php

class CCompraEstadoTipo
{

    public function LoadObject($argument)
    {
        $object = null;
        if (
            array_key_exists('idCompraEstadoTipo', $argument) and array_key_exists('cetDescripcion', $argument)
            and array_key_exists('cetDetalle', $argument)
        ) {
            $object = new CompraEstadoTipo();
            $object->setear($argument['idCompraEstadoTipo'], $argument['cetDescripcion'], $argument['cetDetalle']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idCompraEstadoTipo'])) {
            $object = new CompraEstadoTipo();
            $object->setear($argument['idCompraEstadoTipo'], null, null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idCompraEstadoTipo']))
            $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idCompraEstadoTipo'] = null;
        $object = $this->LoadObject($argument);
        if ($object != null and $object->insertar()) {
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
            if (isset($argument['idCompraEstadoTipo']))
                $where .= " and idCompraEstadoTipo =" . $argument['idCompraEstadoTipo'];
            if (isset($argument['cetDetalle']))
                $where .= " and cetDetalle =" . $argument['cetDetalle'];
            if (isset($argument['cetDescripcion']))
                $where .= " and cetDescripcion ='" . $argument['cetDescripcion'] . "'";
        }

        $object = new CompraEstadoTipo();
        $array = $object->List($where);
        return $array;
    }
}
