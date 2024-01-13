<?php 
class Categorie {
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
            if (count($data) > 0) {
                return $data;
            }
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

}
public function getLatestCategory(){
    
        try {
            $stmt = $this->conn->prepare("SELECT * FROM category order by dateCreation limit 4");
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            }
            
        } catch (PDOException $e) {
            return $e->getMessage();
        }

}
    public function addCategory()
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO category (namen) VALUES (:name)");
            $stmt->bindParam(":name", $this->name);
            if( $stmt->execute()){
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getCategoryrow(){
        try {
            $stmt = $this->conn->prepare("SELECT name FROM category WHERE name = :name");
            $stmt->bindParam(":name", $this->name);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
    public function getCategorywiki($id)
    { 
  
        try {
            $stmt = $this->conn->prepare("SELECT name FROM category WHERE id = :id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateCategory(){
     try {
            $stmt = $this->conn->prepare("UPDATE category SET name = :name, dateCreation =:dateCreation where id=:id");
           
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":dateCreation", $this->dateCreation);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteCategory(){
        try {
            $stmt = $this->conn->prepare("DELETE FROM category WHERE id =:id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}