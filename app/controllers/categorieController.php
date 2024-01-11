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
        if (isset($_POST["submit-add"])) {
            $name = isset($_POST["name"]) ? $this->validateData($_POST["name"]) : null;
            $date = isset($_POST["date"]) ? $this->validateData($_POST["date"]) : null;

            if ($name !== null && $date !== null) {
                $data = [
                    "name" => $name,
                    "date" => $date,
                ];

                $this->model("categorie");
                $this->setCategoryData($data);
                $cat = $this->model->getCategoryrow();
                if ($cat) {
                    $this->index("This Category Already Exists!");
                    exit;
                } else {
                    $this->model->addCategory();
                    redirect("admin");
                }
            }
        }
    }
    public function update_category()
    {
        if (isset($_POST["submit-edite"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $date = $_POST["date"];

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
        redirect("admin");
    }


    // set all data
    public function setCategoryData($data)
    {
        $this->model("categorie");

        $this->model->setName($data["name"]);
        $this->model->setDate($data["date"]);
    }
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
