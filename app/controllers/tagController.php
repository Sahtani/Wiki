<?php
class TagController extends Controller{
    // tags
    public function index($error = "")
    {
        if (isUserLogged()) {
            $tags = $this->displayTag();
            $this->view("admin/tags", "", ["error" => $error, "tags" => $tags]);
            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }
    public function displayTag()
    {
        $this->model("tag");
        $tags = $this->model->getTags();
        if ($tags > 0) {
            return $tags;
        } else {
            $this->index("No tags exist!");
        }
    }
    public function add_tag()
    {
        if (isset($_POST["submit-add"])) {
            $name = isset($_POST["name"]) ? $this->validateData($_POST["name"]) : null;

            if ($name !== null) {
                $data = [
                    "name" => $name,
                ];

                $this->model("tag");
                $this->model->setName($data);
                $cat = $this->model->getTagrow();
                if ($cat) {
                    $this->index("This Tag Already Exists!");
                    exit;
                } else {
                    $this->model->addTag();
                    redirect("tag");
                }
            }
        }
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

