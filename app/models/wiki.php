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
            $stmt = $this->conn->prepare("SELECT user.idUser ,idwiki, title,content, wiki.dateCreation, c.id, c.name FROM wiki inner join `category` as c on c.id=wiki.idcat inner join user on user.idUser=wiki.iduser where archive=0; ");
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
            INNER JOIN category AS c ON c.id = wiki.idcat where archive=0
            ORDER BY wiki.dateCreation DESC
            LIMIT 2  
        ");
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
                return [];
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
        $stmt = $this->conn->prepare('UPDATE  wiki SET title=:title, content=:content ,idcat=:category_id where idwiki=:id  and iduser=:user_id');
        $stmt->bindParam(":id", $this->idwiki);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':content', $this->content);
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
    public function archiveWiki($idWiki)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE wiki   SET archive = 1   where idwiki= :idwiki");
            $stmt->bindParam(':idwiki', $idWiki);
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function searchWiki($input)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM wiki JOIN category ON wiki.idcat = category.id
            LEFT JOIN tag_wiki ON wiki.idwiki = tag_wiki.idwiki LEFT JOIN  tag ON tag_wiki.idtag = tag.idtag left join user on user.idUser = wiki.iduser
            WHERE title LIKE '%{$input}%'  OR category.name LIKE '%$input%' OR tag.name LIKE '%{$input}%' AND wiki.archive = 0;");
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll();
                return $result;
            }
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
            if ($data > 0) {
                return $data;
            } else return 0;
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
            if ($data > 0) {
                return $data;
            } else return 0;
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
            if ($data > 0) {
                return $data;
            } else return 0;
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
            if ($data > 0) {
                return $data;
            } else return 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getTotalCategories()
    {
        try {
            $stmt = $this->conn->prepare('SELECT COUNT(*) as totalCategories FROM category');
            $stmt->execute();
            $data = $stmt->fetch();
            if ($data > 0) {
                return $data;
            } else return 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
    public function getMostUsedCategory()
    {
        try {
            $stmt = $this->conn->prepare('SELECT category.name, COUNT( category.name) as usedcat
         from category 
          join wiki on wiki.idcat=category.id
          GROUP by category.name
           ORDER by usedcat DESC 
           LIMIT 1;');
            $stmt->execute();
            $data = $stmt->fetch();
            if ($data > 0) {
                return $data;
            } else return 0;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}
