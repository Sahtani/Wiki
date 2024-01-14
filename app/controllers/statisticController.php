<?php

class StatisticController extends Controller
{

    public function index($error = "")

    {
        if (isUserLogged()) {
            if (isset($_SESSION["user-id"])) {
                $user_id = $_SESSION["user-id"];
            } else {
                echo "User ID not found in the session.";
            }
            $status = "";
            $this->view("admin/statistic", "", [
                "error" => $error,
                "totalWiki" => $this->totalWiki(),
                "user" => $this->UserMostWiki(),
                "totalTag" => $this->totalTags(),
                "totalAuthor" => $this->totalAuthor(),
                "totalCat" => $this->totalCat(),
                "usedCat" => $this->usedCat(),


            ]);

            $this->view->render();
        } else {
            redirect('user/log_in');
        }
    }
    public function totalWiki()
    {
        $this->model("wiki");
        $totalWiki = $this->model->getTotalWikis();

        return $totalWiki;
    }
    public function UserMostWiki()
    {
        $this->model("wiki");
        $user = $this->model->getUserWithMostWikis();
       
        return $user;
    }
    public function totalTags()
    {
        $this->model("wiki");
        $totalTags = $this->model->getTotalTags();
        return $totalTags;
    }

    public function totalAuthor()
    {
        $this->model("wiki");
        $totalAuthor = $this->model->getTotalAuthors();
            return $totalAuthor;
    }

    public function totalCat()
    {
        $this->model("wiki");
        $total = $this->model->getTotalCategories();
        if ($total > 0) {
            return $total;
        }else return 0;
    }
    public function usedCat()
    {
        $this->model("wiki");
        $total = $this->model->getMostUsedCategory();
        if ($total > 0) {
            return $total;
        } else return 0;
    }
}
