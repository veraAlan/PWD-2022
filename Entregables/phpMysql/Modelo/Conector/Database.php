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
        $this->endine = "mysql";
        $this->host = "localhost";
        $this->database = "phpMyDB"; // Name of the current db.
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
}
