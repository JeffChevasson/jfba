<?php
namespace application\controllers;

use application\models\Comment;
use core\Controller;

class LoginController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet d'afficher l'écran de login pour l'administration du blog
     */
    public function index(){
        $this->render("index");
    }
}