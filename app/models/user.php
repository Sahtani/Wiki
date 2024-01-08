 <?php
    class User
    {
        private $firstName;
        private $lastName;
        private $email;
        private $password;
        private $conn;


        public function __construct()
        {
            $this->conn = Db::getInstance()->getConnection();
        }
    

       
    
        // getters
        public function getfirstName()
        {
            return $this->firstName;
        }
        public function getlasttName()
        {
            return $this->lastName;
        }
        public function getemail()
        {
            return $this->email;
        }
        public function getpassword()
        {
            return $this->password;
        }
        // setters
        public function setfirstName($firstName)
        {
            $this->firstName=$firstName;
        }
        public function setlastName($lastName)
        {
            $this->lastName = $lastName;
        }
        public function setemail($email)
        {
             $this->email=$email;
        }
        public function setpassword($password)
        {
             $this->password=$password;}
        //registeration function
        public function Signup()
        {
            try {
                $stmt = $this->conn->prepare("INSERT INTO user (firstname,lastname,email,password) values(:firstname,:lastname,:email,:password)");
                $stmt->bindParam("firstname", $this->firstName);
                $stmt->bindParam("lastname", $this->lastName);
                $stmt->bindParam("email", $this->email);
                $stmt->bindParam("password", $this->password);
                return  $stmt->execute();
             
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        public function validateUser()
        {
            try {
                $stmt = $this->conn->prepare("SELECT email FROM `user` WHERE email = :email");
                $stmt->bindParam(":email", $this->email);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                error_log("Error in validateUser: " . $e->getMessage());
                return false; 
            }
        }

        public function logIn()
        {
            try {
                $stmt = $this->conn->prepare("SELECT * from user where email=:email");
                $stmt->bindParam(":email", $this->email);
                $stmt->execute();
                return $stmt->fetch();
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }

    }
