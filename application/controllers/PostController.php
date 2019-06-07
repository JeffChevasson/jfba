<?php
namespace application\controllers;

use application\models\Comment;
use application\models\Post;
use core\Controller;
use core\ModelManager;

//require(ROOT."/application/models/Post.php");

class PostController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet de visualiser le contenu d'un post
     */
    public function show($post_id){
        $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        $data["comments"] = ModelManager::find(Comment::class, array("post_id" => $post_id, "display" => 1));
        $this->set($data);
        $this->render("show");
    }

    /**
     * Affiche la liste des commentaires signales par les utilisateurs
     */
    public function showsignales($post_id){
        $commentairesSignales = ModelManager::find(Comment::class, array("display" => 0,
            "post_id" => $post_id));
        $post = ModelManager::findOne(Post::class, array("id" => $post_id));
        $data = array("comments" => $commentairesSignales, "post" => $post);
        $this->set($data);
        $this->render("commentaires_signales");
    }

    /**
     * Permet de supprimer un post ainsi que ses commentaires (uniquement en admin)
     */
    public function delete($post_id){
        // on supprime les commentaires, puis l'article en lui meme
        $comment = ModelManager::delete(Comment::class, array("post_id" => $post_id));
        $post = ModelManager::delete(Post::class, array("id" => $post_id));
        header("Location: ".BASE_URL."admin/posts");
    }

    /**
     * Permet d'afficher la page d'édition d'un article et aussi de les modifier (uniquement en admin)
     */
    public function edit($post_id){
        //if (!array_key_exists("doEdit", $_REQUEST) && !array_key_exists("doCreate", $_REQUEST)) {
        $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        $this->set($data);
        $this->render("edit");
    }

    /**
     * Permet d'editer un post avec l'aide ajax
     */
    public function xhredit($post_id){
        $post = ModelManager::findOne(Post::class, array("id" => $post_id));
        $data_post = array(
            "id" => $post_id,
            "title" => str_replace("'", " ", $_REQUEST["title"]),
            "content" => str_replace("'", " ", $_REQUEST["content"]),
            "modification_date" => (new \DateTime())->format("Y-m-d H:i:s")
        );
        $post->update($data_post);
    }

    /**
     * Permet d'afficher la page d'ajout d'un article (uniquement en admin)
     */
    public function add($post_id){
        $data["post"] = ModelManager::findOne(Post::class, array("id" => $post_id));
        $this->set($data);
        $this->render("edit");
    }

    /**
     * Affichage la page de creation d'un nouvel article (uniquement en admin)
     */
    public function create(){
        $data = array(
            "action" => BASE_URL."post/create",
            "post" => new Post(),
            "nameBtn" => "doCreate"
        );
        $this->set($data);
        $this->render("create");
    }

    /**
     * Permet d'ajouter un post avec l'aide ajax
     */
    public function xhrcreate(){
        //require(ROOT."/application/models/Post.php");
        $post = new Post();
        $data_post = array(
            "title" => str_replace("'", " ", $_REQUEST["title"]),
            "content" => str_replace("'", " ", $_REQUEST["content"]),
            "creation_date" => (new \DateTime())->format("Y-m-d H:i:s")
        );
        $post->save($data_post);
    }
}