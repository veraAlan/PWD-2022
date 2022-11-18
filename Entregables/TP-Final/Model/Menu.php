<?php

class Menu
{
    private $idmenu;
    private $menombre;
    private $padre;
    private $medescripcion;
    private $medeshabilitado;
    private $mensajeOperacion;


    //Getters
    public function getIdMenu()
    {
        return $this->idmenu;
    }

    public function getMeNombre()
    {
        return $this->menombre;
    }

    public function getMeDeshabilitado()
    {
        return $this->medeshabilitado;
    }

    public function getPadre()
    {
        return $this->padre;
    }

    public function getMeDescripcion()
    {
        return $this->medescripcion;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    //Setters
    public function setIdMenu($idmenu)
    {
        $this->idmenu = $idmenu;
    }

    public function setMeNombre($menombre)
    {
        $this->menombre = $menombre;
    }

    public function setMeDeshabilitado($medeshabilitado)
    {
        $this->medeshabilitado = $medeshabilitado;
    }

    public function setPadre($padre)
    {
        $this->padre = $padre;
    }

    public function setMeDescripcion($medescripcion)
    {
        $this->medescripcion = $medescripcion;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->idmenu = "";
        $this->menombre = "";
        $this->padre = null;
        $this->medeshabilitado = null;
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
        $sql = "SELECT * FROM menu WHERE idmenu = " . $this->getIdMenu();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    $objPadre = null;
                    if ($row['idpadre'] != null) {
                        $objPadre = new Menu();
                        $objPadre->setIdMenu($row['idpadre']);
                    }

                    $resp =  true;
                    $this->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $objPadre, $row['medeshabilitado']);
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

        $sql = "INSERT INTO menu (menombre, medescripcion, idPadre, medeshabilitado)  VALUES (
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
            menombre='" . $this->getMenombre() . "',
            medescripcion='" . $this->getMedescripcion() . "',
            idPadre=" . $idPadre . ",
            medeshabilitado=" . $deshabilitado . ",
            ";

        $sql .= " WHERE idmenu = " . $this->getIdMenu();

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

    // TODO TEST
    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();

        $sql = "DELETE FROM menu WHERE idmenu  = " . $this->getIdMenu();

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


    public function List($argument = "")
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
                        $objPadre->setIdMenu($row['idpadre']);
                        $objPadre->Load();
                    }

                    $objMenu->setear($row['idmenu'], $row['menombre'], $row['medescripcion'], $objPadre, $row['medeshabilitado']);
                    array_push($array, $objMenu);
                }
            }
        }
        return $array;
    }
}
