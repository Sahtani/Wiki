<?php 
class Tag{
    private $id;
    private $name;
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
    //   setters 
    // setters
    public function setid($id)
    {
        $this->id = $id;
    }
    public function setName($Name)
    {
        $this->name = $Name;
    }

    // tags:
    public function getTags()
    {

        try {
            $stmt = $this->conn->prepare("SELECT * FROM tag");
            $stmt->execute();
            $data = $stmt->fetchAll();
           
            if (count($data) > 0) {
                return $data;
            }else return false;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTagrow()
    {
        try {
            $stmt = $this->conn->prepare("SELECT name FROM tag WHERE name = :name");
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
    public function addTag()
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO tag (name) VALUES (:name)");
            $stmt->bindParam(":name", $this->name);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function updateTag()
    {
        try {
            $stmt = $this->conn->prepare("UPDATE tag SET name = :name where idtag =:id");

            $stmt->bindParam("id", $this->id);
            $stmt->bindParam(":name", $this->name);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function deleteTag()
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM tag WHERE idtag =:id");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}