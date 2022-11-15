<?php

class MenuRol
{
    private $menu;
    private $rol;
    private $mensajeOperacion;

    //Getters
    public function getRol()
    {
        return $this->rol;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    //Setters
    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function setMenu($menu)
    {
        $this->menu = $menu;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->menu = new Menu();
        $this->rol = new Rol();
        $this->mensajeOperacion = "";
    }

    public function setear($menu, $rol)
    {
        $this->setMenu($menu);
        $this->setRol($rol);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();

        $sql = "SELECT * FROM usuariorol WHERE
                idRol = " . $this->getRol()->getIdRol() . "
                and idMenu =" . $this->getMenu()->getIdMenu();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);

            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    $menu = null;
                    if ($row['idMenu'] != null) {
                        $menu = new Menu();
                        $menu->setIdMenu($row['idMenu']);
                        $menu->Load();
                    }

                    $rol = null;
                    if ($row['idRol'] != null) {
                        $rol = new Rol();
                        $rol->setIdRol($row['idRol']);
                        $rol->Load();
                    }
                    $this->setear($menu, $rol);

                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("menurol->List: " . $dataBase->getError());
        }
        return $resp;
    }


    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO menurol (idMenu,idRol)  VALUES ("
            . $this->getMenu()->getIdMenu() . ","
            . $this->getRol()->getIdRol() . "
                )";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("menurol->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("menurol->Insert: " . $dataBase->getError());
        }
        return $resp;
    }


    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM menurol WHERE
                idMenuRol = " . $this->getMenu()->getIdMenu()
            . "and idRol =" . $this->getRol()->getIdRol();

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("menurol->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("menurol->Delete: " . $dataBase->getError());
        }
        return $resp;
    }


    public function List($argument = "")
    {
        $array = null;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM menurol ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {
                $array = array();
                while ($row = $dataBase->Register()) {
                    $menu = null;
                    if ($row['idMenu'] != null) {
                        $menu = new Menu();
                        $menu->setIdMenu($row['idMenu']);
                        $menu->Load();
                    }
                    $rol = null;
                    if ($row['idRol'] != null) {
                        $rol = new Rol();
                        $rol->setIdRol($row['idRol']);
                        $rol->Load();
                    }
                    $object = new MenuRol();
                    $object->setear($menu, $rol);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }
}
