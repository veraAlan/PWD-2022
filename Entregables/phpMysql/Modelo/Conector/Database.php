<?php

class Database extends PDO
{
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $debug;
    private $linked; // Connection status.
    private $index;
    private $result;

    /**
     * Construct Function
     */
    public function __construct()
    {
        $this->engine = "mysql";
        $this->host = "localhost";
        $this->database = ""; // Name of the current db.
        $this->user = "root";
        $this->pass = ""; // TODO add pass.
        $this->debug = true;
        $this->error = "";
        $this->sql = "";
        $this->index = 0;

        $dns = $this->engine . ":dbname=" . $this->database . ";host=" . $this->host;
        try {
            parent::__construct($dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        } catch (PDOException $e) {
            $this->sql = $e->getMessage();
            $this->linked = false;
        }
    }

    /* TODO 
    Start DB. 
    Add Setters + Getters. 
    Add SQL queries.
    */

    /**
     * Get DB status.
     */
    public function Start()
    {
        return $this->getLinked();
    }

    // Setters
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    public function setError($e)
    {
        $this->error = $e;
    }

    // TODO Check this function
    public function setSQL($variable)
    {
        return "\n" . $this->sql = $variable;
    }

    // Getters
    public function getLinked()
    {
        return $this->linked;
    }

    public function getDebug()
    {
        return $this->debug;
    }

    public function getError()
    {
        return $this->error;
    }

    // TODO Check this function also
    public function getSQL()
    {
        return "\n" . $this->sql;
    }

    // DB Functions
    /**
     * Check debug contents.
     */
    public function checkDebug()
    {
        $e = $this->errorInfo();
        $this->setError($e);
        if ($this->getDebug()) {
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

    /**
     * Execute the query sent to DB.
     * @param string $query
     */
    public function Execute($query)
    {
        if (stristr($query, "insert")) {
            $ans = $this->Insert($query);
        }
        if (stristr($query, "update") || stristr($query, "delete")) {
            $ans = $this->DeleteUpdate($query);
        }
        if (stristr($query, "select")) {
            $ans = $this->Select($query);
        }
        return $ans;
    }

    public function Insert($query)
    {
        $answer = parent::query($query);
        if (!$answer) {
            $this->checkDebug();
            $id = 0;
        } else {
            $id = $this->lastInsertId();
            if ($id == 0) {
                $id = -1;
            }
        }
        return $id;
    }

    public function DeleteUpdate($query)
    {
        $answer = parent::query($query);
        $rows = -1;
        if (!$answer) {
            $this->checkDebug();
        } else {
            $rows = $answer->rowCount();
        }
        return $rows;
    }

    public function Select($query)
    {
        $rows = -1;
        $answer = parent::query($query);
        if (!$answer) {
            $this->checkDebug();
        }
        // TODO
    }
}
