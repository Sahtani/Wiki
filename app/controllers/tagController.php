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
        if (isUserLogged()) {
        $this->model("tag");
        $tags = $this->model->getTags();
        if ($tags > 0) {
            return $tags;
        } else {
            $this->index("No tags exist!");
            }
        } else {
            redirect('user/log_in');
        }
    }
    public function add_tag()
    {
        if (isset($_POST["submitadd"])) {
            $name = isset($_POST["name"]) ? $this->validateData($_POST["name"]) : null;
                $this->model("tag");
                $this->model->setName($name);
                $tag = $this->model->getTagrow();
             
                if ($tag) {
                    $this->index("This Tag Already Exists!");
                } else {
                    $this->model->addTag();
                    redirect("tag");
                }
            }
        
    }
    public function update_tag()
    {
        if (isset($_POST["submit-edite"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
           
            $data = [
                    "id" => $this->validateData($id),
                    "name" => $this->validateData($name),
                ];
            
            $this->model("tag");
            $this->setTag($data);

            $result = $this->model->updateTag();
            if ($result) {
                redirect("tag");
            } else {
                $this->index("Failed to update tag.");
            }
        }
    }
    public function setTag($data)
    {
        $this->model("tag");
        $this->model->setid($data["id"]);
        $this->model->setName($data["name"]);
    }
    // delete tag
    public function delete_tag($id)
    {
        $this->model("tag");
        $this->model->setid($id);
        $result = $this->model->deleteTag();
        redirect("tag");
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

