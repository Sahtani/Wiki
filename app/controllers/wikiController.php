<?php class WikiController extends Controller{
public function index($error=""){

      $role=$_SESSION["role"];
      
        
           
            $this->view("home/home", "", ["error" => $error,"role"=>$role]);
            $this->view->render();
      


}





}