<?php

class CCompraEstado
{

    public function LoadObject($argument)
    {
        $object = null;
        if (
            array_key_exists('idcompraestado', $argument) and array_key_exists('idcompra', $argument)
            and array_key_exists('idcompraestadotipo', $argument) and array_key_exists('cefechaini', $argument)
            and array_key_exists('cefechafin', $argument)
        ) {

            $objectCompra = new Compra();
            $objectCompra->setIdCompra($argument['idcompra']);
            $objectCompra->Load();

            $objectCompraET = new CompraEstadoTipo();
            $objectCompraET->setIdCompraEstadoTipo($argument['idCompraEstadoTipo']);
            $objectCompraET->Load();

            $object = new CompraEstado();
            $object->setear($argument['idCompraEstado'], $objectCompra, $objectCompraET, $argument['ceFechaIni'], $argument['ceFechaFin']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = null;
        if (isset($argument['idcompraestado'])) {
            $object = new CompraEstado();
            $object->setear($argument['idcompraestado'], null, null, null, null);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idCompraEstado']))
            $resp = true;
        return $resp;
    }

    public function High($argument)
    {
        $resp = false;
        $argument['idCompraEstado'] = null;
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
        $where = "true";
        if ($argument != null) {
            if (isset($argument['idCompraEstado']))
                $where .= " and idcompraestado =" . $argument['idCompraEstado'];
            if (isset($argument['idCompra']))
                $where .= " and idcompra =" . $argument['idCompra'];
            if (isset($argument['idCompraEstadoTipo']))
                $where .= " and idcompraestadotipo ='" . $argument['idcompraestadotipo'] . "'";
        }
        $object = new CompraEstado();
        $array = $object->List($where);
        return $array;
    }
}
