<?php
namespace application\controllers;

use application\models\Post;
use core\Controller;
use core\ModelManager;

class AccueilController extends Controller {

    protected $layout = "frontend";

    /**
     * Par default on affiche la liste des posts
     */
    function index()
    {
        $data["posts"] = ModelManager::find(Post::class);
        $this->set($data);
        $this->render("index");
    }

}
