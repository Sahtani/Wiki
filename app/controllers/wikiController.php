<?php class WikiController extends Controller
{
      private $wikis;
      private $user;
      private $category;
      private $tags;

      public function __construct()
      {

            $this->user = $this->model('user');

            $this->tags = $this->model('tag');
      }
      public function index($error = "")
      {
            if (isUserLogged()) {
                  $role = $_SESSION["role"];
                  $this->view("home/home", "", ["error" => $error, "role" => $role]);
                  $this->view->render();
            } else {
                  redirect('user/log_in');
            }
      }
      public function Mywikis($error = "")
      {
            if (isUserLogged()) {
                  $user_id = $_SESSION["user-id"];
                  $role = $_SESSION["role"];
                  $wikis = $this->displayWikis($user_id);
                  $this->view("home/mywikis", "", ["error" => $error, "role" => $role, "wikis" => $wikis]);
                  $this->view->render();
            } else {
                  redirect('user/log_in');
            }
      }
      public function displayWikis($user_id)
      {
            $user_id = $_SESSION["user-id"];
            $this->model('wiki');
            $wikis = $this->model->getWikis($user_id);
          
                  return $wikis;
            // } else $this->index("add new wiki");
      }

      public function formwiki($error = "")
      {
            $role = $_SESSION["role"];
            $this->model('categorie');
            $category = $this->model->getCategory();
            $this->model('tag');
            $tag = $this->model->getTags();

            $this->view("home/addwiki", "", ["error" => $error, "cat" => $category, "tag" => $tag]);
            $this->view->render();
      }
      public function formwikiUpdate($idwiki,$error = "" )
      {
            if (isUserLogged()) {
                  $this->model('wiki');
                  $wiki = $this->model->getWiki($idwiki);
                  $wikiTags = $this->model->getWikiTags($idwiki);
                  $wiki["wikitags"] = $wikiTags;
                  $this->model('categorie');
                  $category = $this->model->getCategory();
                  $this->model('tag');
                  $tag = $this->model->getTags();

                  $this->view("home/upwiki", "", ["error" => $error, "wiki" => $wiki,"cat" => $category, "tag" => $tag]);
                  $this->view->render();
            }
      }

      public function add_wiki()
      {
            if (isset($_POST['submitwiki'])) {
                  $title = $_POST["title"];
                  $content = $_POST["content"];
                  $date = $_POST["date"];
                  $idcat = $_POST["cat"];
                  $iduser = $_SESSION["user-id"];


                  $data = [
                        "title" => $this->validateData($title),
                        "content" => $this->validateData($content),
                        "date" => $this->validateData($date),
                        "idcat" => $this->validateData($idcat),
                        "iduser" => $this->validateData($iduser),
                  ];
                  $this->model('wiki');
                  $this->setData($data);
                  $lastidWiki = $this->model->addWiki();
                  if ($lastidWiki) {
                        if (isset($_POST['listbox'])) {
                              $tag_id = $_POST['listbox'];
                              $this->model('tag');
                              $this->model->add_wiki_tags($lastidWiki, $tag_id);

                              redirect('wiki/Mywikis');
                        }
                  }
            }
      }
      public function update_wiki()
      {
            if (isset($_POST['submitupdate'])) {

                  $title = $_POST["title"];
                  $content = $_POST["content"];
                  $date = $_POST["date"];
                  $idcat = $_POST["cat"];
                  $iduser = $_SESSION["user-id"];


                  $data = [
                        "id" => $_POST['id'],
                        "title" => $this->validateData($title),
                        "content" => $this->validateData($content),
                        "date" => $this->validateData($date),
                        "idcat" => $this->validateData($idcat),
                        "iduser" => $this->validateData($iduser),
                  ];
                  $this->model('wiki');
                  $this->setData($data);
                  $this->model->getWiki();
                  $lastidWiki = $this->model->updateWiki();
                  if ($lastidWiki) {
                        if (isset($_POST['listbox'])) {
                              $tag_id = $_POST['listbox'];
                              $this->model('tag');
                              $this->model->add_wiki_tags($lastidWiki, $tag_id);

                              redirect('wiki/Mywikis');
                        }
                  }
            }
      }



      public function delete_wiki($id)
      {    
    
        $this->model("wiki");
        $this->model->setIdwiki($id);
        $result = $this->model->deleteWiki();
        redirect("wiki/mywikis");
    
      }
      public function setData($data)
      {
            $this->model('wiki');
            // $this->model->setIdwiki($idwiki);
            $this->model->setTitle($data["title"]);
            $this->model->setContent($data["content"]);
            $this->model->setDate($data["date"]);
            $this->model->setIdcat($data["idcat"]);
            $this->model->setIduser($data["iduser"]);
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
