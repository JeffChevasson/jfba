<?php
namespace application\controllers;

use application\models\Comment;
use application\models\Post;
use core\Controller;
use core\ModelManager;

class PostController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet de visualiser le contenu d'un post
     */
    public function show($post_id){
        $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        $data["comments"] = ModelManager::find(Comment::class, array("post_id" => $post_id));
        $this->set($data);
        $this->render("show");
    }
}