<?php
use core\Dispatcher;

define('WEBROOT', str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT."/core/Controller.php");
require(ROOT."/core/Model.php");
require(ROOT."/core/ModelManager.php");
require(ROOT."/core/SQLConnection.php");

require(ROOT . '/core/Router.php');
require(ROOT . '/core/Request.php');
require(ROOT . '/core/Dispatcher.php');

$dispatch = new Dispatcher();
$dispatch->dispatch();

?>