<?php
namespace application\controllers;

use application\models\Member;
use application\models\Post;
use core\Controller;
use core\ModelManager;

class AdminController extends Controller {

    protected $layout = "frontend";

    /**
     * Affiche la page principale de gestion des posts
     */
    public function posts(){
        $data["posts"] = ModelManager::find(Post::class);
        $this->set($data);
        $this->render("posts");
    }
}