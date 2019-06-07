<?php
namespace application\controllers;

use application\models\Comment;
use core\Controller;
use core\ModelManager;

class CommentController extends Controller
{

    protected $layout = "frontend";

    /**
     * Permet de creer un nouveau commentaire a un post
     */
    public function xhrcreate()
    {
        // on recupere les donnees du formulaire HTML
        $data                 = $_REQUEST;
        $data["comment_date"] = (new \DateTime())->format("Y-m-d H:i:s");
        // on enregistre le commentaire en BDD
        $comment    = new Comment();
        $comment_id = $comment->save($data);
        echo "Votre commentaire a bien été pris en compte";
    }

    /**
     * Permet de signaler un commentaire indésirable
     */
    public function signaler($comment_id)
    {
        $comment = ModelManager::findOne(Comment::class, array("id" => $comment_id));
        $comment->update(array(
            "id" => $comment_id, "repport" => (new \DateTime())->format("Y-m-d H:i:s"),
            "display" => 0
        ));
        echo "Votre signalement a été pris en compte";
    }

    /**
     * Permet de publier a nouveau un commentaire indésirable
     */
    public function autoriser($comment_id)
    {
        $comment = ModelManager::findOne(Comment::class, array("id" => $comment_id));
        $comment->update(array(
            "id" => $comment_id, "repport" => null,
            "display" => 1
        ));
        echo "Le commentaire est de nouveau visible sur l'article";
    }
    /**
     * Permet de supprimer dans la BDD un commentaire indésirable
     */
    public function supprimer($comment_id)
        {
            ModelManager::delete(Comment::class, array("id" => $comment_id));

            echo "Le commentaire a été bien supprimé !";
            
        }
}
