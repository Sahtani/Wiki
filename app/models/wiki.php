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
    public function getWiki($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM wiki INNER JOIN user ON wiki.iduser = user.idUser INNER JOIN category AS c ON c.id = wiki.idcat WHERE wiki.iduser = :id ORDER BY wiki.dateCreation DESC; ");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetchAll();

            if (count($data) > 0) {
                return $data;
            } else {
                return [];
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getAllWiki()
    {
        try {
            $stmt = $this->conn->prepare("SELECT idwiki, title,content, wiki.dateCreation, c.id, c.name FROM wiki inner join `category` as c on c.id=wiki.idcat");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll();
            } else {
                return [];
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getLatestWiki()
    {
        try {
            $stmt = $this->conn->prepare("
            SELECT *
            FROM wiki
            INNER JOIN user ON wiki.iduser = user.idUser
            INNER JOIN category AS c ON c.id = wiki.idcat
            ORDER BY wiki.dateCreation DESC
            LIMIT 4
        ");
            $stmt->execute();
            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getWikiByid($idwiki)
    {
        try {
            $stmt = $this->conn->prepare("
            SELECT *
            FROM wiki
            INNER JOIN user ON wiki.iduser = user.idUser
            INNER JOIN category AS c ON c.id = wiki.idcat
            WHERE wiki.idwiki = :idwiki
            ORDER BY wiki.dateCreation DESC
        ");
            $stmt->bindParam(":idwiki", $idwiki);
            $stmt->execute();

            $result = $stmt->fetch();

            return ($result !== false) ? $result : false;
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


    public function getWikiTags($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM `tag_wiki` as tw LEFT JOIN tag as t on tw.idtag = t.idtag WHERE tw.idwiki =:id;");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetchAll();
            if (count($data) > 0) {
                return $data;
            } else {
                return [];
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function addWiki()
    {


        $stmt = $this->conn->prepare('INSERT INTO wiki (title, content,iduser,idcat) VALUES (:title,:content,:user_id,:category_id)');
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':user_id', $this->iduser);
        $stmt->bindParam(':category_id', $this->idcat);



        if ($stmt->execute()) {
            $lastInsertId = $this->conn->lastInsertId();
            return $lastInsertId;
        } else {
            return false;
        }
    }
    public function updateWiki()
    {
        $stmt = $this->conn->prepare('UPDATE  wiki SET title=:title, content=:content,dateCreation=:date where iduser=:user_id and idcat=:category_id and idwiki=:id');
        $stmt->bindParam(":id", $this->idwiki);
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
    public function deleteWiki()
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM wiki WHERE idwiki =:id");
            $stmt->bindParam(":id", $this->idwiki);
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTotalWikis()
    {
        try {
            $stmt = $this->conn->prepare('SELECT COUNT(idwiki) as totalWikis FROM wiki');
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getUserWithMostWikis()
    {
        try {
            $stmt = $this->conn->prepare('
    SELECT u.lastname ,u.firstname , COUNT(w.iduser) as wikiCount
    FROM wiki w
    JOIN user u ON w.iduser = u.idUser
    GROUP BY w.iduser
    ORDER BY wikiCount DESC
    LIMIT 1;
    ');
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getTotalTags()
    {
        try {
            $stmt = $this->conn->prepare('SELECT COUNT(idtag) as totalTags FROM tag');
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTotalAuthors()
    {
        try {
            $stmt = $this->conn->prepare('SELECT COUNT( idUser) as totalAuthors FROM user');
            $stmt->execute();
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTotalCategories()
    {
        try {
            $stmt = $this->conn->prepare('SELECT COUNT(*) as totalCategories FROM category');
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getMostUsedCategory()
    {
        try {
            $stmt = $this->conn->prepare('SELECT categories.name, COUNT( categories.name) as number_used
         from categories
          join wikis on wikis.category_id=categories.category_id 
          GROUP by categories.name
           ORDER by number_used DESC 
           LIMIT 1;');
            $data = $stmt->fetch();
            return $data;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
