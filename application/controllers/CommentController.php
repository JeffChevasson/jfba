<?php
namespace application\controllers;

use application\models\Comment;
use core\Controller;

require(ROOT."/application/models/Comment.php");

class CommentController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet de creer un nouveau commentaire a un post
     */
    public function create(){
        // on recupere les donnees du formulaire HTML
        $post_id = $_REQUEST["post_id"];
        $data = $_REQUEST;
        $data["comment_date"] = (new \DateTime())->format("Y-m-d H:i:s");
        // on enregistre le commentaire en BDD
        $comment = new Comment();
        $comment_id = $comment->save($data);
        header( "Location: /post/show/".$post_id);
    }
}