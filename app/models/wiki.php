<?php 
class Wiki{
    private $id;
    private $name;
    private $conn;

    public function __construct()
    {
        $this->conn = Db::getInstance()->getConnection();
    }}