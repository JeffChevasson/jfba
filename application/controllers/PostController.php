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

    /**
     * Permet de supprimer un post ainsi que ses commentaires (uniquement en admin)
     */
    public function delete($post_id){
        // on supprime les commentaires, puis l'article en lui meme
        $comment = ModelManager::delete(Comment::class, array("post_id" => $post_id));
        $post = ModelManager::delete(Post::class, array("id" => $post_id));
        header("Location: /admin/posts");
    }

    /**
     * Permet d'afficher la page d'édition d'un article et aussi de les modifier (uniquement en admin)
     */
    public function edit($post_id){
        if (!array_key_exists("doEdit", $_REQUEST) && !array_key_exists("doCreate", $_REQUEST)) {
            $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
            $this->set($data);
            $this->render("edit");
        }

        if (array_key_exists("doEdit", $_REQUEST)) {
            $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        }
    }

    /**
     * Permet d'afficher la page d'ajout d'un article (uniquement en admin)
     */
    public function add($post_id){
        $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        $this->set($data);
        $this->render("edit");
    }
}