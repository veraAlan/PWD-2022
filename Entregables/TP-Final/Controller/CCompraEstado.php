<?php

class CCompraEstado
{

    public function LoadObject($argument)
    {
        $object = new CompraEstado();
        if (
            array_key_exists('idcompra', $argument) and
            array_key_exists('idcompraestadotipo', $argument) and
            array_key_exists('cefechaini', $argument)
        ) {

            $objectCompra = new Compra();
            $objectCompra->setIdCompra($argument['idcompra']);
            $objectCompra->Load();
            $objectCompraET = new CompraEstadoTipo();
            $objectCompraET->setIdCompraEstadoTipo($argument['idcompraestadotipo']);
            $objectCompraET->Load();

            $object->setCompra($objectCompra);
            $object->setCompraEstadoTipo($objectCompraET);
            $object->setCeFechaIni($argument['cefechaini']);
        }
        return $object;
    }

    public function LoadObjectEnKey($argument)
    {
        $object = new CompraEstado();
        if (isset($argument['idcompraestado'])) {
            $object->setIdCompraEstado($argument['idcompraestado']);
        }
        if (isset($argument['idcompra'])) {
            $objectCompra = new Compra();
            $objectCompra->setIdCompra($argument['idcompra']);
            $objectCompra->Load();
            $object->setCompra($objectCompra);
        }
        $object->Load();
        if (isset($argument['idcompraestadotipo'])) {
            $objEstadoTipo = new CompraEstadoTipo();
            $objEstadoTipo->setIdCompraEstadoTipo($argument['idcompraestadotipo']);
            $objEstadoTipo->Load();
            $object->setCompraEstadoTipo($objEstadoTipo);
        }
        return $object;
    }

    public function SetearEnKey($argument)
    {
        $resp = false;
        if (isset($argument['idcompraestado']))
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
        if ($this->SetearEnKey($argument)) {
            $object = $this->LoadObjectEnKey($argument);
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
            if (isset($argument['idcompraestado']))
                $where .= " and idcompraestado = " . $argument['idcompraestado'];
            if (isset($argument['idcompra']))
                $where .= " and idcompra = " . $argument['idcompra'];
            if (isset($argument['idcompraestadotipo']))
                $where .= " and idcompraestadotipo = '" . $argument['idcompraestadotipo'] . "'";
        }
        $object = new CompraEstado();
        $array = $object->List($where);
        return $array;
    }
}
