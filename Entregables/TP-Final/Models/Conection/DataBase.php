<?php
class DataBase extends PDO
{

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $debug;
    private $conec;
    private $indice;
    private $resultado;

    public function __construct()
    {
        $this->engine = 'mysql';
        $this->host = 'localhost';
        $this->database = 'carrito_compras';
        $this->user = 'root';
        $this->pass = '';
        $this->debug = true;
        $this->error = "";
        $this->sql = "";
        $this->indice = 0;

        $dns = $this->engine . ':dbname=' . $this->database . ";host=" . $this->host;
        try {
            parent::__construct($dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $this->conec = true;
        } catch (PDOException $e) {
            $this->sql = $e->getMessage();
            $this->conec = false;
        }
    }


    public function Start()
    {
        return $this->getConec();
    }

    //Getters
    public function getConec()
    {
        return $this->conec;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function getSQL()
    {
        return "\n" . $this->sql;
    }


    private function getIndice()
    {
        return $this->indice;
    }


    public function getError()
    {
        return "\n" . $this->error;
    }

    private function getResultado()
    {

        return $this->resultado;
    }

    //Setters
    public function setSQL($e)
    {
        return "\n" . $this->sql = $e;
    }

    public function setError($e)
    {
        $this->error = $e;
    }

    private function setIndice($valor)
    {
        $this->indice = $valor;
    }
    private function setResultado($valor)
    {
        $this->resultado = $valor;
    }

    public function setDebug($debug)
    {
        $this->debug = $debug;
    }


    public function Execute($sql)
    {
        $this->setError("");
        $this->setSQL($sql);
        $resp = null;
        if (stristr($sql, "insert")) {
            $resp =  $this->ExecuteInsert($sql);
        }
        if (stristr($sql, "update") or stristr($sql, "delete")) {
            $resp =  $this->ExecuteDeleteUpdate($sql);
        }
        if (stristr($sql, "select")) {
            $resp =  $this->ExecuteSelect($sql);
        }
        return $resp;
    }

    private function ExecuteInsert($sql)
    {
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->AnalizarDebug();
            $id = 0;
        } else {
            $id =  $this->lastInsertId();
            if ($id == 0) {
                $id = -1;
            }
        }
        return $id;
    }

    private function ExecuteDeleteUpdate($sql)
    {
        $cantFilas = -1;
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->AnalizarDebug();
        } else {
            $cantFilas =  $resultado->rowCount();
        }
        return $cantFilas;
    }



    private function ExecuteSelect($sql)
    {
        $cant = -1;
        $resultado = parent::query($sql);
        if (!$resultado) {
            $this->AnalizarDebug();
        } else {

            $arregloResult = $resultado->fetchAll();
            $cant = count($arregloResult);
            $this->setIndice(0);
            $this->setResultado($arregloResult);
        }
        return $cant;
    }


    public function Register()
    {
        $filaActual = false;
        $indiceActual = $this->getIndice();
        if ($indiceActual >= 0) {
            $filas = $this->getResultado();
            if ($indiceActual < count($filas)) {
                $filaActual =  $filas[$indiceActual];

                $indiceActual++;
                $this->setIndice($indiceActual);
            } else {
                $this->setIndice(-1);
            }
        }

        return $filaActual;
    }


    private function AnalizarDebug()
    {
        $e = $this->errorInfo();
        $this->setError($e);
        if ($this->getDebug()) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }
}
