<?php
namespace application\controllers;

use application\models\Comment;
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
        $new_posts = array();
        $nb_signaler_par_post = array();
        $posts = ModelManager::find(Post::class);
        /*foreach ($posts as $post){
            $new_posts[] = $post;
            $commentairesSignales = ModelManager::find(Comment::class, array("display" => 0,
                "post_id" => $post->getId()));
            $nb_signaler_par_post[$post->getId()] = count($commentairesSignales);
        }*/
        $data = array("posts" => $posts, "stats_posts" => $nb_signaler_par_post);
        $this->set($data);
        $this->render("posts");
    }
}