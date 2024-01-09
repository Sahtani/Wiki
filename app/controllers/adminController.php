<?php
ob_flush();
class AdminController extends Controller
{
    public function index($error = "")
    {
        if (isUserLogged()) {
            $category = $this->displayCategory();
            $this->view("admin/dashboard", "", ["error" => $error,"category" => $category]);
            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }
    // display category
    public function displayCategory()
    {
        $this->model("admin");
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

                $this->model("admin");
                $this->setCategoryData($data);

                $result = $this->model->addCategory();
                if ($result) {
                    redirect("admin");

                    exit();
                } else {
                    $this->index("categorie not Added Successfully!");
                };
 
            //     if ($result === true) {
            //        ;
            //     } else {
            //         echo "Error adding category: " . $result;
            //     }
            // } else {
            //     echo "Invalid data submitted.";
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
            "name" => $this->validateData($name),
            "date" => $this->validateData($date),
        ];
        $this->model("admin");
        $this->setCategoryData($data);

        $result = $this->model->updateCategory(); 
       var_dump($result);
       die();
            if ($result) {
                redirect("admin");
               
            } else {
                $this->index("Failed to update categorie.");
            }
    }}
    // delete category
    public function delete_category($id)
    {
        $this->model("admin");
        $this->model->setid($id);
        $result = $this->model->deleteCategory();
        redirect("admin");
    }
    // tags

    // set all data
    public function setCategoryData($data)
    {
        $this->model("admin");
        $this->model->setName($data["name"]);
        $this->model->setDate($data["date"]);
    }

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
