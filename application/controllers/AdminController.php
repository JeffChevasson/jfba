<?php
namespace application\controllers;

use application\models\Comment;
use application\models\Post;
use core\Controller;
use core\ModelManager;

class AdminController extends Controller {

    protected $layout = "frontend";

    /**
     * Affiche la page principale de gestion des posts
     */
    public function posts(){
        $new_posts = array();
        $commentaires_signaler_par_post = array();
        $posts = ModelManager::find(Post::class);
        foreach ($posts as $post){
            $new_posts[] = $post;
            $commentaires_signaler_par_post[$post->getId()] = array();
            $commentairesSignales = ModelManager::find(Comment::class, array("display" => 0,
                "post_id" => $post->getId()));
            foreach ($commentairesSignales as $comm){
                $commentaires_signaler_par_post[$post->getId()][] = $comm;
            }
        }
        $data = array("posts" => $posts, "stats_posts" => $commentaires_signaler_par_post);
        $this->set($data);
        $this->render("posts");
    }
}