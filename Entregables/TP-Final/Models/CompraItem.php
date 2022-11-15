<?php
class CompraItem
{
    private $idCompraItem;
    private $objProducto;
    private $objCompra;
    private $cantidad;
    private $mensajeFuncion;

    //Getters
    public function getIdCompraItem()
    {
        return $this->idCompraItem;
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
    public function setIdCompraItem($idCompraItem)
    {
        $this->idCompraItem = $idCompraItem;
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
        $this->idCompraItem = "";
        $this->objProducto = new Producto;
        $this->objCompra = new Compra;
        $this->cantidad = "";
    }

    public function setear($idCompraItem, $idProducto, $idCompra, $cantidad)
    {
        $this->objProducto->setIdProducto($idProducto);
        $this->objCompra->setIdCompra($idCompra);
        $this->setIdCompraItem($idCompraItem);
        $this->setCantidad($cantidad);
        $this->objProducto->Load();
        $this->objCompra->Load();
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        if ($this->getIdCompraItem() != '') {
            $sql = "SELECT * FROM compraitem WHERE idCompraItem = " . $this->getIdCompraItem();
        }
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idCompraItem'], $row['idProducto'], $row['idCompra'], $row['ciCantidad']);
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
        $consult = "INSERT INTO compraitem (idCompraItem, idProducto, idCompra, ciCantidad) VALUES (
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
        SET idCompraItem = {$this->getIdCompraItem()},
        idProducto = {$this->getObjProducto()->getIdProducto()},
        idCompra = {$this->getObjCompra()->getIdCompra()},
        ciCantidad = {$this->getCantidad()}
        WHERE idCompraItem = {$this->getIdCompraItem()}";
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
        $arrayCompraitem = null;
        $dataBase = new DataBase();
        $consultaCompraItem = "SELECT * FROM compraitem ";
        if ($argument != "") {
            $consultaCompraItem = $consultaCompraItem . ' WHERE ' . $argument;
        }
        $consultaCompraItem .= " ORDER BY idCompraItem ";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consultaCompraItem)) {
                $arrayCompraitem = array();
                while ($compraItem = $dataBase->Register()) {
                    $objCompraItem = new CompraItem();
                    $objCompraItem->setear($compraItem["idCompraItem"], $compraItem["idProducto"], $compraItem["idCompra"], $compraItem["ciCantidad"],);
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
            $consult = "DELETE FROM compraitem WHERE idCompraItem = " . $this->getIdCompraItem();
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
