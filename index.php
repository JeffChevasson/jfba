<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

use core\Dispatcher;

define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

$uri = explode("/", $_SERVER['REQUEST_URI']);
if ((count($uri) > 1) && empty($uri[2])){
    if (!array_key_exists("username", $_SESSION)) {
        header("Location: accueil/index");
    }else{
        header("Location: admin/posts");
    }
}

$base_url = "http://".$_SERVER['SERVER_NAME']."/".$uri[1]."/";

require(ROOT."/core/Model.php");

require(ROOT."/application/models/Post.php");
require(ROOT."/application/models/Member.php");
require(ROOT."/application/models/Comment.php");

require(ROOT."/core/ModelManager.php");
require(ROOT."/core/SQLConnection.php");

require(ROOT . '/core/Router.php');
require(ROOT . '/core/Request.php');
require(ROOT . '/core/Dispatcher.php');
require(ROOT."/core/Controller.php");

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>