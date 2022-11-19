<?php

class Producto
{
    private $idproducto;
    private $nombre;
    private $detalle;
    private $cantStock;
    private $proprecio;
    private $urlimage;
    private $mensajeFuncion;


    //Getters
    public function getIdProducto()
    {
        return $this->idproducto;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function getCantStock()
    {
        return $this->cantStock;
    }

    public function getUrlImagen()
    {
        return $this->urlimage;
    }

    public function getMensajeFuncion()
    {
        return $this->mensajeFuncion;
    }

    public function getProPrecio()
    {
        return $this->proprecio;
    }


    //Setters
    public function setIdProducto($idproducto)
    {
        $this->idproducto = $idproducto;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;
    }

    public function setCantStock($cantStock)
    {
        $this->cantStock = $cantStock;
    }

    public function setMensajeFuncion($mensajeFuncion)
    {
        $this->mensajeFuncion = $mensajeFuncion;
    }

    public function setUrlImagen($urlimage)
    {
        $this->urlimage = $urlimage;
    }

    public function setProPrecio($proprecio)
    {
        $this->proprecio = $proprecio;
    }


    public function __construct()
    {
        $this->idproducto = "";
        $this->nombre = "";
        $this->detalle = "";
        $this->proprecio = "";
        $this->cantStock = "";
        $this->urlimage = "";
    }

    public function setear($idproducto, $nombre, $detalle, $cantStock, $proprecio, $ulrImagen)
    {
        $this->setIdProducto($idproducto);
        $this->setNombre($nombre);
        $this->setDetalle($detalle);
        $this->setCantStock($cantStock);
        $this->setProPrecio($proprecio);
        $this->setUrlImagen($ulrImagen);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM producto ";
        if ($this->getIdProducto() != '') {
            $sql .= "WHERE idproducto = " . $this->getIdProducto();
        }

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock'], $row['proprecio'], $row['urlimage']);
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

        $consulta = "INSERT INTO producto (pronombre, prodetalle, procantstock, proprecio, urlimage";
        if ($this->getIdProducto() != null) {
            $consulta .= ",idproducto";
        }
        $consulta .= ") VALUES ('" . $this->getNombre() . "','"
            . $this->getDetalle() . "','"
            . $this->getCantStock() . "','"
            . $this->getProPrecio() . "','"
            . $this->getUrlImagen() . "'";
        if ($this->getIdProducto() != null) {
            $consulta .= ",'" . $this->getIdProducto() . "'";
        }
        $consulta .= ");";
        if ($dataBase->Start()) {
            if (!$this->Load()) {
                if ($elid = $dataBase->Execute($consulta)) {
                    $this->setIdProducto($elid);
                    $resp = true;
                } else {
                    $this->setMensajeFuncion("producto->Insert: " . $dataBase->getError());
                }
            } else {
                $this->setMensajeFuncion("producto->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion("producto->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $consulta = "UPDATE producto
        SET idproducto = {$this->getIdProducto()},
        pronombre = '{$this->getNombre()}',
        prodetalle = '{$this->getDetalle()}',
        procantstock = {$this->getCantStock()},
        proprecio = {$this->getProPrecio()},
        urlimage = '{$this->getUrlImagen()}'
        WHERE idproducto = {$this->getIdProducto()}";
        echo "<br>SQL: " . $consulta . "<br>";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($consulta)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $dataBase = new DataBase();
        $resp = false;
        if ($dataBase->Start()) {
            $consulta = "DELETE FROM producto WHERE idproducto = '" . $this->getIdProducto() . "'";
            if ($dataBase->Execute($consulta)) {
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
        $array = null;
        $dataBase = new DataBase();
        $consultaPersona = "SELECT * FROM producto ";
        if ($argument != "") {
            $consultaPersona = $consultaPersona . ' WHERE ' . $argument;
        }
        $consultaPersona .= " ORDER BY idproducto ";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consultaPersona)) {
                $array = array();
                while ($Producto = $dataBase->Register()) {
                    $objectProducto = new Producto();
                    $objectProducto->setear($Producto['idproducto'], $Producto['pronombre'], $Producto['prodetalle'], $Producto['procantstock'], $Producto['proprecio'], $Producto['urlimage']);
                    array_push($array, $objectProducto);
                }
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $array;
    }
}
