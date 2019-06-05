<?php
namespace core;

class Controller{

    protected $vars = [];

    protected $layout = "default";

    public function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    public function render($filename)
    {
        extract($this->vars);
        ob_start();
        $cls = explode("\\", get_class($this));
        require(ROOT . "application/views/" . strtolower(str_replace('Controller', '', $cls[count($cls) - 1])) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "application/views/layouts/" . $this->layout . '.php');
        }
    }

}
?>
