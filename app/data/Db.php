<?php
class Db
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'wiki';
    private $connection;
    private static $instance;
    private function  __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
