<?php
class CategorieController extends Controller
{
    public function index($error = "")
    {
        if (isUserLogged()) {
            $category = $this->displayCategory();
            $this->view("admin/dashboard", "", ["error" => $error, "category" => $category]);
            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }
    // display category
    public function displayCategory()
    {
        $this->model("categorie");
        $category = $this->model->getCategory();
        if ($category) {
            return $category;
        } else {
            $this->index("No category ");
        }
    }
    
    // addCategory
    public function add_category()
    {
      
        if (isset($_POST["submit-add"])) {   //die("hi"); 
            $name = isset($_POST["name"]) ? $this->validateData($_POST["name"]) : null;
        
            if ($name !== null) {
                $data = [
                    "name" => $name,
                ];

                $this->model("categorie");
                $this->model->setName($data["name"]);
                $cat = $this->model->getCategoryrow();
                if ($cat) {
                    $this->index("This Category Already Exists!");
                    exit;
                } else {
                    $this->model->addCategory();
                    redirect("categorie");
                }
            }
        }
    }
    public function update_category()
    {
        if (isset($_POST["submit-edite"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $date =date('Y-m-d H:i:s');;

            $data = [
                "id" => $this->validateData($id),
                "name" => $this->validateData($name),
                "date" => $this->validateData($date),
            ];
            $this->model("categorie");
            $this->setCategoryDataup($data);

            $result = $this->model->updateCategory();
            if ($result) {
                redirect("categorie");
            } else {
                $this->index("Failed to update categorie.");
            }
        }
    }
    // delete category
    public function delete_category($id)
    {
        $this->model("categorie");
        $this->model->setid($id);
        $result = $this->model->deleteCategory();
        redirect("categorie");
    }

    // set all data
    public function setCategoryDataup($data)
    {
        $this->model("categorie");
        $this->model->setid($data["id"]);
        $this->model->setName($data["name"]);
        $this->model->setDate($data["date"]);
    }
   
    // public function
    public function validateData($data)
    {
        if (isset($data) and !empty($data)) {
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
}
