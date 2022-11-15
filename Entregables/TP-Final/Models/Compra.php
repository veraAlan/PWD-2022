<?php

class compra{


private $idCompra;
private $coFecha;
private $usuario;

public function __construct()
{
    $this->idCompra = "";
    $this->coFecha = "";
    $this->usuario = ""; /* este llama al objeto usuario para conseguir el id */
}

public function setValues($idCompra, $coFecha, $usuario)
{
    $this->idCompra = $idCompra;
    $this->coFecha = $coFecha;
    $this->usuario = $usuario;
}


//setters

public function setIdCompra($idCompra)
{
    $this->idCompra = $idCompra;
}

public function setCoFeche($coFecha)
{
    $this->coFecha = $coFecha;
}

public function setUsuario($usuario)
{
    $this->usuario = $usuario;
}

public function setMessage($message)
{
    $this->message = $message;
}

//getters

public function getIdCompra()
{
    return $this->idCompra;
}

public function getCoFecha()
{
    return $this->coFecha;
}

public function getUsuario()
{
    return $this->usuario;
}

public function getMessage()
{
    return $this->message;
}



public function Load()
    {
        $ans = false;
        $db = new Database();
        $query = "SELECT * FROM compra WHERE idcompra = '" . $this->getIdCompra() . "'";

        if ($db->Start()) {
            $status = $db->Execute($query);
            if ($status > -1 && $status > 0) {
                $row = $db->Register();
                // Create a person object so we can find the Duenio object.
                $usuario = new usuario();
                $usuario->setIdUsuario($row['idusuario']);
                $usuario->Load();

                $this->setValues(
                    $row['idcompra'],
                    $row['cofecha'],
                    $usuario
                );

                $ans = true;
            }
        } else {
            $this->setMessage("compra->Load: " . $db->getError());
        }

        return $ans;
    }

    public function Insert()
    {
        $ans = false;
        $db = new Database();
        $query = "INSERT INTO compra(idcompra, cofecha, idusuario) VALUES('" .
            $this->getIdCompra() . "', '" .
            $this->getCoFecha() . "', '" .
            $this->getUsuario()->getIdUsuario() . "');";

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("compra->Insert: " . $db->getError());
            }
        } else {
            $this->setMessage("compra->Insert: " . $db->getError());
        }

        return $ans;
    }

    public function Modify()
    {
        $ans = false;
        $db = new Database();
        $query = "UPDATE compra SET 
        cofecha = '" . $this->getCoFecha() . "', 
        idusuario = '" . $this->getUsuario()->getIdUsuario() . "'
        WHERE idcompra = '" . $this->getIdCompra() . "'";

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("compra->Modify: " . $db->getError());
            }
        } else {
            $this->setMessage("compra->Modify: " . $db->getError());
        }

        return $ans;
    }

    public function Delete()
    {
        $ans = false;
        $db = new Database();
        $query = "DELETE FROM compra WHERE idcompra = " . $this->getIdCompra();

        if ($db->Start()) {
            if ($db->Execute($query)) {
                $ans = true;
            } else {
                $this->setMessage("compra->Delete: " . $db->getError());
            }
        } else {
            $this->setMessage("compra->Delete: " . $db->getError());
        }

        return $ans;
    }


    public function List($condition = "")
    {
        $array = array();
        $db = new Database();
        $query = "SELECT * FROM auto ";
        if ($condition != "") {
            $query .= "WHERE " . $condition;
        }

        $ans = $db->Execute($query);
        if ($ans > -1) {
            if ($ans > 0) {
                while ($row = $db->Register()) {
                    $compraObj = new compra();
                    // Create a duenio object from persona.
                    $usuarioObj = new usuario();
                    $usuarioObj->setIdUsuario($row['idusuario']);
                    $usuarioObj->Load();

                    $compraObj->setValues(
                        $row['idcompra'],
                        $row['cofecha'],
                        $usuarioObj
                    );
                    array_push($array, $compraObj);
                }
            }
        } else {
            $this->setMessage("compra->List: " . $db->getError());
        }

        return $array;
    }




}




?>