<?php

class Database
{

    private $_HOST = "localhost";
    private $_USERNAME = "root";
    private $_PASSWORD = "";
    private $_DATABASE_NAME = "cms";
    

    protected $db;
    function __construct()
    {
        $MYSQL_CONNECTION_STRING = "mysql:host=$this->_HOST;dbname=$this->_DATABASE_NAME;charset=utf8";
        $this->db = new PDO($MYSQL_CONNECTION_STRING, $this->_USERNAME, $this->_PASSWORD);
    }
    function connection()
    {
        try {
            if ($this->db == null) {
                $this->db->query("SET NAMES utf8");
                $this->db->query("SET CHARACTER SET 'utf8_general_ci'");
                $this->db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->db;
        } catch (PDOException $e) {

            echo "Bağlantı Hatası: " . $e->getMessage() . "<br />";
        }
    }
    function lastID()
    {
        try {
            return $this->connection()->lastInsertId();
        } catch (PDOException $e) {
            return array('err' => true, 'msg' => $e->getMessage());
        }
    }

}