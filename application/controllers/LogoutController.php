<?php
namespace application\controllers;

use core\Controller;

class LogoutController extends Controller {

    protected $layout = "frontend";

    /**
     * Permet de se deconnecter du back office
     */
    public function index(){
        unset($_SESSION["username"]);
        session_destroy();
        header("Location: /login/index");
    }
}