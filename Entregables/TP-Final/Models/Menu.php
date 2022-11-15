<?php

class Menu
{
    private $idMenu;
    private $meNombre;
    private $padre;
    private $meDescripcion;
    private $meDeshabilitado;
    private $mensajeOperacion;


    //Getters
    public function getIdMenu()
    {
        return $this->idMenu;
    }

    public function getMeNombre()
    {
        return $this->meNombre;
    }

    public function getMeDeshabilitado()
    {
        return $this->meDeshabilitado;
    }

    public function getPadre()
    {
        return $this->padre;
    }

    public function getMeDescripcion()
    {
        return $this->meDescripcion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    //Setters
    public function setIdMenu($idMenu)
    {
        $this->idMenu = $idMenu;
    }

    public function setMeNombre($meNombre)
    {
        $this->meNombre = $meNombre;
    }

    public function setMeDeshabilitado($meDeshabilitado)
    {
        $this->meDeshabilitado = $meDeshabilitado;
    }

    public function setPadre($padre)
    {
        $this->padre = $padre;
    }

    public function setMeDescripcion($meDescripcion)
    {
        $this->meDescripcion = $meDescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->idMenu = "";
        $this->meNombre = "";
        $this->padre = null;
        $this->meDeshabilitado = null;
        $this->mensajeOperacion = "";
    }

    public function setear($id, $nombre, $descripcion, $padre, $deshabilitado)
    {
        $this->setIdMenu($id);
        $this->setMeNombre($nombre);
        $this->setMeDeshabilitado($deshabilitado);
        $this->setPadre($padre);
        $this->setMeDescripcion($descripcion);
    }


    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM menu WHERE idMenu = " . $this->getIdMenu();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    $objPadre = null;
                    if ($row['idPadre'] != null) {
                        $objPadre = new Menu();
                        $objPadre->setIdMenu($row['idPadre']);
                        $objPadre->Load();
                    }

                    $resp =  true;
                    $this->setear($row['idMenu'], $row['meNombre'], $row['meDescripcion'], $objPadre, $row['meDeshabilitado']);
                }
            }
        } else {
            $this->setMensajeOperacion("menu->List: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();

        $idPadre = $this->getPadre();
        if ($idPadre != null) {
            $idPadre = "'" . $idPadre->getIdMenu() . "'";
        }

        $deshabilitado = $this->getMeDeshabilitado();
        if ($deshabilitado != null) {
            $deshabilitado = "'" . $deshabilitado . "'";
        }

        $sql = "INSERT INTO menu (meNombre, meDescripcion, idPadre, meDeshabilitado)  VALUES (
                '" . $this->getMeNombre() . "',
                '" . $this->getMeDescripcion() . "',
                " . $idPadre . ",
                " . $deshabilitado . "
                )";

        if ($dataBase->Start()) {
            if ($id = $dataBase->Execute($sql)) {
                $this->setIdMenu($id);
                $resp = true;
            } else {
                $this->setMensajeOperacion("menu->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("menu->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();

        $idPadre = $this->getPadre();
        if ($idPadre != null) {
            $idPadre = "'" . $idPadre->getIdMenu() . "'";
        }

        $deshabilitado = $this->getMeDeshabilitado();
        if ($deshabilitado != null) {
            $deshabilitado = "'" . $deshabilitado . "'";
        }

        $sql = "UPDATE menu SET
            meNombre='" . $this->getMenombre() . "',
            meDescripcion='" . $this->getMedescripcion() . "',
            idPadre=" . $idPadre . ",
            meDeshabilitado=" . $deshabilitado . ",
            ";

        $sql .= " WHERE idMenu = " . $this->getIdMenu();

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("menu->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setmensajeoperacion("menu->Modify: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();

        $sql = "DELETE FROM menu WHERE idMenu = " . $this->getIdMenu();

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("menu->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("menu->Delete: " . $dataBase->getError());
        }
        return $resp;
    }


    public function listar($argument = "")
    {
        $array = null;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM menu ";

        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }

        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {

                $array = array();
                while ($row = $dataBase->Register()) {

                    $objMenu = new Menu();
                    $objPadre = null;

                    if ($row['idpadre'] != null) {
                        $objPadre = new Menu();
                        $objPadre->setIdMenu($row['idPadre']);
                        $objPadre->Load();
                    }

                    $objMenu->setear($row['idMenu'], $row['meNombre'], $row['meDescripcion'], $objPadre, $row['meDeshabilitado']);
                    array_push($array, $objMenu);
                }
            }
        }
        return $array;
    }
}
