<?php
class Wiki
{
    private $idwiki;
    private $title;
    private $content;
    private $date;
    private $idcat;
    private $iduser;
    private $conn;


    public function __construct()
    {
        $this->conn = Db::getInstance()->getConnection();
    }

    // Getter and Setter for $idwiki
    public function getIdwiki()
    {
        return $this->idwiki;
    }

    public function setIdwiki($idwiki)
    {
        $this->idwiki = $idwiki;
    }

    // Getter and Setter for $title
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    // Getter and Setter for $content
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    // Getter and Setter for $date
    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    // Getter and Setter for $idcat
    public function getIdcat()
    {
        return $this->idcat;
    }

    public function setIdcat($idcat)
    {
        $this->idcat = $idcat;
    }

    // Getter and Setter for $iduser
    public function getIduser()
    {
        return $this->iduser;
    }

    public function setIduser($iduser)
    {
        $this->iduser = $iduser;
    }
   public function getWiki($id){

        try {
            // $stmt = $this->conn->prepare("SELECT * FROM wiki WHERE idwiki =:id");
            $stmt = $this->conn->prepare("SELECT idwiki, title,content, wiki.dateCreation, c.id, c.name FROM wiki inner join `category` as c on c.id=wiki.idcat WHERE idwiki=:id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetch();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getWikis($user_id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM wiki WHERE iduser = :iduser");
            $stmt->bindParam(":iduser", $user_id);
            $stmt->execute();
            $data = $stmt->fetchAll();

            if (count($data) > 0) {
                return $data;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function getWikiTags($id) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM `tag_wiki` as tw LEFT JOIN tag as t on tw.idtag = t.idtag WHERE tw.idwiki =:id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            }else {
                return [];
            }
        }catch(PDOException $e) {
            return $e->getMessage();
        }
    }
   
    public function addWiki()
    {


        $stmt = $this->conn->prepare('INSERT INTO wiki (title, content,dateCreation,iduser,idcat) VALUES (:title,:content,:date,:user_id,:category_id)');
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':user_id', $this->iduser);
        $stmt->bindParam(':category_id', $this->idcat);



        if ($stmt->execute()) { 
            $lastInsertId = $this->conn->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }
    public function updateWiki($id){
        $stmt = $this->conn->prepare('UPDATE  wiki SET title=:title, content=:content,dateCreation=:date where iduser=:user_id,idcat=:category_id');
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':user_id', $this->iduser);
        $stmt->bindParam(':category_id', $this->idcat);
        if ($stmt->execute()) {
           return true;
        } else {
            return false;
        }
    }
    public function deleteWiki(){
        try {
            $stmt = $this->conn->prepare("DELETE FROM wiki WHERE idwiki =:id");
            $stmt->bindParam(":id", $this->idwiki);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }

    }
}
