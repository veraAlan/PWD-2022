<?php

class producto 
{

    private $IdProducto;
    private $proNombre;
    private $proDetalle;
    private $proCantStock;


    public function __construct()
    {
        $this->IdProducto = "";
        $this->proNombre = "";
        $this->proDetalle = "";
        $this->proCantStock = "";
    }

    public function setValues($IdProducto, $proNombre, $proDetalle, $proCantStock)
    {
        $this->IdProducto = $IdProducto;
        $this->proNombre = $proNombre;
        $this->proDetalle = $proNombre;
        $this->proCantStock = $proCantStock;
    }

    //setters 

    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;
    }

    public function setProNombre($proNombre)
    {
        $this->proNombre = $proNombre;
    }

    public function setProDetalle($proDetalle)
    {
        $this->proDetalle = $proDetalle;
    }

    public function setProCantStock($proCantStock)
    {
        $this->proCantStock = $proCantStock;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }


    //getters

    public function getIdProducto()
    {
        return $this->IdProducto;
    }

    public function getProNombre()
    {
        return $this->proNombre;
    }

    public function getProDetalle()
    {
        return $this->proDetalle;
    }

    public function getProCantStock()
    {
        return $this->proCantStock;
    }

    public function getMessage()
    {
        return $this->message;
    }



    public function Load()
    {
        $ans = false;
        $db = new Database();
        $query = "SELECT * FROM producto WHERE idproducto = '" . $this->getIdProducto() . "'";

        if ($db->Start()) {
            $status = $db->Execute($query);
            if ($status > -1 && $status > 0) {
                $row = $db->Register();
                $this->setValues($row['idproducto'], $row['pronombre'], $row['prodetalle'], $row['procantstock']);
                $ans = true;
            }
        } else {
            $this->setMessage("producto->Load: " . $db->getError());
        }

        return $ans;
    }

    public function Insert()
    {
        $ans = false;
        $db = new Database();
        $query = "INSERT INTO producto(idproducto, pronombre, prodetalle, procantstock) VALUES('" .
            $this->getIdProducto() . "', '" .
            $this->getProNombre() . "', '" .
            $this->getProDetalle() . "', '" .
            $this->getProCantStock() . "');";

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("producto->Insert: " . $db->getError());
            }
        } else {
            $this->setMessage("producto->Insert: " . $db->getError());
        }

        return $ans;
    }

    public function Modify()
    {
        $ans = false;
        $db = new Database();
        $query = "UPDATE producto SET 
        pronombre = '" . $this->getProNombre() . "', 
        prodetalle = '" . $this->getProDetalle() . "', 
        procantstock = '" . $this->getProCantStock() . "' 
        WHERE idproducto = '" . $this->getIdProducto() . "'";

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("producto->Modify: " . $db->getError());
            }
        } else {
            $this->setMessage("producto->Modify: " . $db->getError());
        }

        return $ans;
    }

    public function Delete()
    {
        $ans = false;
        $db = new Database();
        $query = "DELETE FROM producto WHERE idproducto = " . $this->getIdProducto();

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("producto->Delete: " . $db->getError());
            }
        } else {
            $this->setMessage("producto->Delete: " . $db->getError());
        }

        return $ans;
    }

    public function List($condition = "")
    {
        $array = array();
        $db = new Database();
        $query = "SELECT * FROM producto ";
        if ($condition != "") {
            $query .= "WHERE " . $condition;
        }
        $ans = $db->Execute($query);
        if ($ans > -1) {
            if ($ans > 0) {
                while ($row = $db->Register()) {
                    $obj = new producto();
                    $obj->setValues(
                        $row['idproducto'],
                        $row['pronombre'],
                        $row['prodetalle'],
                        $row['procantstock']
                    );
                    array_push($array, $obj);
                }
            }
        } else {
            $this->setMessage("producto->List: " . $db->getError());
        }

        return $array;
    }
}


?>