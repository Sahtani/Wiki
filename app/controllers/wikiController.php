<?php class WikiController extends Controller
{
      public function index($error = "")
      {
            $role = $_SESSION["role"];
            $this->view("home/home", "", ["error" => $error, "role" => $role]);
            $this->view->render();
      }
      public function Mywikis($error = "")
      {
            $role = $_SESSION["role"];
            $this->view("home/mywikis", "", ["error" => $error, "role" => $role]);
            $this->view->render();
      }
      public function add_wiki()
      {
      }
      public function update_wiki()
      {
      }
      public function delete_wiki()
      {
      }
}
