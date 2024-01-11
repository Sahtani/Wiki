<?php


class UserController extends Controller
{
    public function index($error = "")
    {
        $this->view("signup", "", ["error" => $error]);
        $this->view->render();
    }
    public function log_in($error = "")
    {
        $this->view("login", "", ["error" => $error]);
        $this->view->render();
    }
    public function home($error = "")
    {

        $this->view("task/home", "", ["error" => $error]);
        $this->view->render();
    }
    public function project($error=""){
        $this->view("project/project", "", ["error" => $error]);    
        $this->view->render();
    }
    public function Usersignup()
    {
        if (isset($_POST["submit"])) {
            $firstName =  $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $data = array(
                "f_name" => $this->validateData($firstName),
                "l_name" => $this->validateData($lastName),
                "email" => filter_var($this->validateData($email), FILTER_SANITIZE_EMAIL),
                "password" => password_hash($this->validateData($password), PASSWORD_DEFAULT),
            );

            $this->model("user");
            $this->setUserData($data);
            $existed_Person = $this->model->validateUser();
            if ($existed_Person) {
                $this->index("This Email Already Exists!");
                exit;
            } else {
                // Sign up the user
                $this->model->Signup();
                redirect("user/log_in");
            }
        }
    }

    // set all data
    public function setUserData($data)
    {
        $this->model("user");
        $this->model->setfirstName($data["f_name"]);
        $this->model->setlastName($data["l_name"]);
        $this->model->setemail($data["email"]);
        $this->model->setpassword($data["password"]);
    }
    // mehtod for login
    public function Userlogin()
    {
        if (isset($_POST["submit"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $this->model("user");

            $this->model->setemail($email);
           $this->model->setpassword($password);


            $user = $this->model->logIn();
            if ($user !== false && $email= $user['email']&& password_verify($password, $user['password'])  ) { $_SESSION['authorize'] = true;
                $_SESSION["user-id"] = $user["idUser"];
                $_SESSION["name-id"] = $user["firstname"];
                $_SESSION["role"] = $user["role"];
              
                if($user['role']=='admin'){
                     redirect("admin"); 
                }elseif($user['role'] == 'user'|| $user['role'] == 'author'){
                    redirect("wiki"); 
                }

               

               
              
            } else {
                $this->log_in("This account does not exist or the password is incorrect.");
                exit;
            }
        } else {
            header("Location: http://localhost/DataWare_Version3//public/home/");
        }
    }
    // validate data
    public function validateData($data)
    {
        if (isset($data) and !empty($data)) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
    // loGout 
    public function logout()
    {

        if (session_destroy()) {
            redirect('user/log_in');
        }
    }

}
