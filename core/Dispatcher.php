<?php
namespace core;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $name = ucfirst($this->request->controller) . "Controller";
        $file = ROOT . 'application/controllers/' . $name . '.php';
        require($file);
        $cls = "application\\controllers\\".$name;
        $controller = new $cls();
        return $controller;
    }

}
?>