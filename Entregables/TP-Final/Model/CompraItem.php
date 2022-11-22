<?php
class CompraItem
{
    private $idcompraitem;
    private $objProducto;
    private $objCompra;
    private $cantidad;
    private $mensajeFuncion;

    //Getters
    public function getIdCompraItem()
    {
        return $this->idcompraitem;
    }

    public function getObjProducto()
    {
        return $this->objProducto;
    }

    public function getObjCompra()
    {
        return $this->objCompra;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getMensajeFuncion()
    {
        return $this->mensajeFuncion;
    }


    //Setters
    public function setIdCompraItem($idcompraitem)
    {
        $this->idcompraitem = $idcompraitem;
    }

    public function setObjProducto($objProducto)
    {
        $this->objProducto = $objProducto;
    }

    public function setObjCompra($objCompra)
    {
        $this->objCompra = $objCompra;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function setMensajeFuncion($mensajeFuncion)
    {
        $this->mensajeFuncion = $mensajeFuncion;
    }


    public function __construct()
    {
        $this->idcompraitem = "";
        $this->objProducto = new Producto;
        $this->objCompra = new Compra;
        $this->cantidad = "";
    }

    public function setear($idcompraitem, $idproducto, $idcompra, $cantidad)
    {
        $this->objProducto->setIdProducto($idproducto);
        $this->objCompra->setIdCompra($idcompra);
        $this->setIdCompraItem($idcompraitem);
        $this->setCantidad($cantidad);
        $this->objProducto->Load();
        $this->objCompra->Load();
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        if ($this->getIdCompraItem() != '') {
            $sql = "SELECT * FROM compraitem WHERE idcompra = " . $this->getIdCompraItem();
        }

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idcompraitem'], $row['idproducto'], $row['idcompra'], $row['cicantidad']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $dataBase = new DataBase();
        $resp = false;
        $consult = "INSERT INTO compraitem (idcompraitem, idproducto, idcompra, cicantidad) VALUES (
		'" . $this->getIdCompraItem() . "',
		'" . $this->getObjProducto()->getIdProducto() . "',
		'" . $this->getObjCompra()->getIdCompra() . "',
		'" . $this->getCantidad() . "')";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consult)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $consult = "UPDATE compraitem
        SET idcompraitem = {$this->getIdCompraItem()},
        idproducto = {$this->getObjProducto()->getIdProducto()},
        idcompra = {$this->getObjCompra()->getIdCompra()},
        cicantidad = {$this->getCantidad()}
        WHERE idcompraitem = {$this->getIdCompraItem()}";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consult)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }


    public function List($argument = "")
    {
        $dataBase = new DataBase();
        $consultaCompraItem = "SELECT * FROM compraitem ";
        if ($argument != "") {
            $consultaCompraItem = $consultaCompraItem . ' WHERE ' . $argument;
        }
        $consultaCompraItem .= " ORDER BY idcompraitem ";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($consultaCompraItem)) {
                $arrayCompraitem = array();
                while ($compraItem = $dataBase->Register()) {
                    $objCompraItem = new CompraItem();
                    $objCompraItem->setear($compraItem["idcompraitem"], $compraItem["idproducto"], $compraItem["idcompra"], $compraItem["cicantidad"],);
                    array_push($arrayCompraitem, $objCompraItem);
                }
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $arrayCompraitem;
    }

    public function Delete()
    {
        $dataBase = new DataBase();
        $resp = false;
        if ($dataBase->Start()) {
            $consult = "DELETE FROM compraitem WHERE idcompraitem = " . $this->getIdCompraItem();
            if ($dataBase->Execute($consult)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }
}
