<?php
namespace application\controllers;

use application\models\Member;
use core\Controller;
use core\ModelManager;

class LoginController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet d'afficher l'écran de login pour l'administration du blog
     */
    public function index(){
        $this->render("index");
    }

    /**
     * Permet d'authentifier l'utilisateur et de sauvegarder sa session s'il existe
     */
    public function authenticate(){
        $data = array();
        $criteria = array(
            "pseudo" => $_REQUEST["username"],
            "pass" => md5($_REQUEST["password"])
        );
        $member = ModelManager::findOne(Member::class, $criteria);
        $data["error"] = "";
        if (is_null($member)){
            $data["error"] = "Mauvais login et/ou mot de passe. Merci de réessayer.";
            $this->set($data);
            $this->render("index");
        }else{
            $_SESSION["username"] = $member->getPseudo();
            $this->set($data);
            header("Location: /admin/posts");
        }

    }
}