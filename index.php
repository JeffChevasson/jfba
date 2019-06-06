<?php
// On démarre la session AVANT d'écrire du code HTML
session_start();

use core\Dispatcher;

define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

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