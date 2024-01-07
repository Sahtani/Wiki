<?php
class Db {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'Wiki';
    private $connection;
    private static $instance;
    
    public function  __construct(){
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    }
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }

}

?>

