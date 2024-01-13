<?php
class WikiController extends Controller
{
      public function index($error = "")
      {
            if (isset($_SESSION["role"])) {
                  $role = $_SESSION["role"];
            } else $role = "";
            $latestWiki=$this->displayLatestWiki();
            $this->view("home/home", "", ["error" => $error, "role" => $role, "Awikis" => $this->displayAllWikis(),"lastWiki"=> $latestWiki]);
            $this->view->render();
      }
      public function wikiAdmin($error = ""){
            if (isUserLogged()) {
            if (isset($_SESSION["role"])) {
                  $role = $_SESSION["role"];
            } else $role = "";
            $this->view("admin/wikiAdmin", "", ["error" => $error, "role" => $role, "Awikis" => $this->displayAllWikis()]);
            $this->view->render();
            } else {
                  redirect('wiki');
            }
      }

      public function Mywikis($error = "")
      {
            if (isUserLogged()) {
                  $user_id = $_SESSION["user-id"];
                  $role = $_SESSION["role"];

                  $this->model('wiki');
                  $wikis = $this->model->getWiki($user_id);
                  $wikisWithTags = [];
                  foreach ($wikis as $wiki) {
                        $tags = $this->model->getWikiTags($wiki['idwiki']);
                        $wiki['wikitags'] = $tags;
                        $wikisWithTags[] = $wiki;
                  }

                  $this->view("home/mywikis", "", ["error" => $error, "role" => $role, "wikis" => $wikisWithTags]);
                  $this->view->render();
            } else {
                  redirect('wiki');
            }
      }
      public function displayLastCategory($error="")
      {
            $role = $_SESSION["role"];
           
            $this->model("categorie");
            $category = $this->model->getLatestCategory();
          
                
            $this->view("home/categorie", "", ["error" => $error, "role" => $role, "categorie" => $category]);
            $this->view->render();
      }
      public function displayLatestWiki()
      {
            $this->model('wiki');
            $wikis = $this->model->getLatestWiki();
             $LastwikisWithTags = [];

            foreach ($wikis as $wiki) {
                  $tags = $this->model->getWikiTags($wiki['idwiki']);
                  $wiki['wikitagsLast'] = $tags;
                  $LastwikisWithTags[] = $wiki;
            }
            return $LastwikisWithTags;
      }

      
      public function displayWikis($user_id)
      {
            $user_id = $_SESSION["user-id"];
            $this->model('wiki');
            $wikis = $this->model->getWikis($user_id);
            return $wikis;
      }
      public function displayAllWikis()
      {
            $this->model('wiki');
            $wikis = $this->model->getAllWiki();
            $wikisWithTags = [];

            foreach ($wikis as $wiki) {
                  $tags = $this->model->getWikiTags($wiki['idwiki']);
                  $wiki['wikitags'] = $tags;
                  $wikisWithTags[] = $wiki;
            }
            return $wikisWithTags;
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
      public function formwikiUpdate($idwiki, $error = "")
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

                  $this->view("home/upwiki", "", ["error" => $error, "wiki" => $wiki, "cat" => $category, "tag" => $tag]);
                  $this->view->render();
            }
      }

      public function add_wiki()
      {
            if (isset($_POST['submitwiki'])) {
                  $title = $_POST["title"];
                  $content = $_POST["content"];
                  $idcat = $_POST["cat"];
                  $iduser = $_SESSION["user-id"];
                  $data = [
                        "title" => $this->validateData($title),
                        "content" => $this->validateData($content),
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
                  $this->model->setIdwiki($data["id"]);
                  $this->setData($data);

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

public function archive_wiki(){

}

      public function delete_wiki($id)
      {

            $this->model("wiki");
            $this->model->setIdwiki($id);
            $result = $this->model->deleteWiki();
            redirect("wiki/mywikis");
      }
      public function signlepage($idwiki, $error = "")
      {
            if (isset($_SESSION["role"])) {
                  $role = $_SESSION["role"];
            } else $role = "";
            $this->model('wiki');
            $wiki = $this->model->getWikiByid($idwiki);
            $wikiTags = $this->model->getWikiTags($idwiki);
            $wiki["wikitags"] = $wikiTags;
            $this->view("home/single_page", "", ["error" => $error, "role" => $role, "wiki" => $wiki]);
            $this->view->render();
      }

      public function setData($data)
      {
            $this->model('wiki');
            // $this->model->setIdwiki($idwiki);
            $this->model->setTitle($data["title"]);
            $this->model->setContent($data["content"]);
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
