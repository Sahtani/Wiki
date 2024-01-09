<?php 
class Admin {
    private $id;
    private $name;
    private $dateCreation;
    private $conn;


    public function __construct()
    {
        $this->conn = Db::getInstance()->getConnection();
    }
    // geters 
    public function getid()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getdate()
    {
        return $this->dateCreation;
    }
    // setters
    public function setid($id)
    {
        $this->id = $id;
    }
    public function setName($Name)
    {
        $this->name = $Name;
    }
    public function setDate($date)
    {
        $this->dateCreation = $date;
    }

// getCategory
public function getCategory(){
        try {
            $stmt = $this->conn->prepare("SELECT * FROM category");
            $stmt->execute();
            $data = $stmt->fetchAll();
            // if (count($data) > 0) {
            //     return $data;
            // }
        } catch (PDOException $e) {
            return $e->getMessage();
        }

}
public function addCategory(){
    try{
        $stmt=$this->conn->prepare("INSERT INTO category (name,dateCreation) value(:name,:date)");
        $stmt->bindParam(":name",$this->name);
        $stmt->bindParam(":date",$this->dateCreation);
        $stmt->execute();
        
    } catch (PDOException $e) {
            return $e->getMessage();
        }
}

    


}