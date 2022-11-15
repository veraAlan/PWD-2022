<<?php

    class Producto
    {
        private $idProducto;
        private $nombre;
        private $detalle;
        private $cantStock;
        private $proPrecio;
        private $urlImagen;
        private $mensajeFuncion;


        //Getters
        public function getIdProducto()
        {
            return $this->idProducto;
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
            return $this->urlImagen;
        }

        public function getMensajeFuncion()
        {
            return $this->mensajeFuncion;
        }

        public function getProPrecio()
        {
            return $this->proPrecio;
        }


        //Setters
        public function setIdProducto($idProducto)
        {
            $this->idProducto = $idProducto;
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

        public function setUrlImagen($urlImagen)
        {
            $this->urlImagen = $urlImagen;
        }

        public function setProPrecio($proPrecio)
        {
            $this->proPrecio = $proPrecio;
        }


        public function __construct()
        {
            $this->idProducto = "";
            $this->nombre = "";
            $this->detalle = "";
            $this->proPrecio = "";
            $this->cantStock = "";
            $this->urlImagen = "";
        }

        public function setear($idProducto, $nombre, $detalle, $cantStock, $proPrecio, $ulrImagen)
        {
            $this->setIdProducto($idProducto);
            $this->setNombre($nombre);
            $this->setDetalle($detalle);
            $this->setCantStock($cantStock);
            $this->setProPrecio($proPrecio);
            $this->setUrlImagen($ulrImagen);
        }

        public function Load()
        {
            $resp = false;
            $dataBase = new DataBase();
            $sql = null;
            if ($this->getIdProducto() != '') {
                $sql = "SELECT * FROM producto WHERE idProducto = " . $this->getIdProducto();
            }
            if ($dataBase->Start()) {
                $res = $dataBase->Execute($sql);
                if ($res > -1) {
                    if ($res > 0) {
                        $row = $dataBase->Register();
                        $this->setear($row['idProducto'], $row['proNombre'], $row['proDetalle'], $row['proCantStock'], $row['proPrecio'], $row['urlImagen']);
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
            $consulta = "INSERT INTO producto (proNombre, proDetalle, proCantStock, proPrecio, urlImagen) VALUES (
        '" . $this->getNombre() . "',
		'" . $this->getDetalle() . "',
		'" . $this->getCantStock() . "',
		'" . $this->getProPrecio() . "',
		'" . $this->getUrlImagen() . "')";
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

        public function Modify()
        {
            $resp = false;
            $dataBase = new DataBase();
            $consulta = "UPDATE producto
        SET idProducto = '{$this->getIdProducto()}',
        proNombre = '{$this->getNombre()}',
        proDetalle = '{$this->getDetalle()}',
        proCantStock = '{$this->getCantStock()}',
        proPrecio = '{$this->getProPrecio()}',
        urlImagen = '{$this->getUrlImagen()}',
        WHERE idProducto = '{$this->getIdProducto()}'";
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
                        $objectProducto->setear($Producto['idProducto'], $Producto['proNombre'], $Producto['proDetalle'], $Producto['proCantStock'], $Producto['proPrecio'], $Producto['urlImagen']);
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
