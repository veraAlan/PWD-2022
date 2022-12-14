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

    public function SetearEnKey($idRol)
    {
        $rolObj = new Menu();
        $rolObj->setIdMenu($idRol);
        $rolObj->Load();
        $this->setMenu($rolObj);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM menurol WHERE
                idrol  = " . $this->getRol()->getIdRol();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    if ($row['idmenu'] != null) {
                        $menuObj = new Menu();
                        $menuObj->setIdMenu($row['idmenu']);
                        $menuObj->Load();
                        $this->setMenu($menuObj);
                    }
                    $this->setear($this->getMenu(), $this->getRol());
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
        $sql = "INSERT INTO menurol (idmenu,idrol)  VALUES ("
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
                idrol = " . $this->getRol()->getIdRol();

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

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $query = "UPDATE menurol SET
        idmenu = " . $this->getMenu()->getIdMenu() . " WHERE idrol = '" . $this->getRol()->getIdRol() . "'";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($query)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("menurol->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("menurol->Modify: " . $dataBase->getError());
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

                    $menu = new Menu();
                    $menu->setIdMenu($row['idmenu']);
                    $menu->Load();

                    $rol = new Rol();
                    $rol->setIdRol($row['idrol']);
                    $rol->Load();

                    $menuRol = new MenuRol();
                    $menuRol->setear($menu, $rol);
                    $menuRol->Load();

                    array_push($array, $menuRol);
                }
            }
        }
        return $array;
    }
}
