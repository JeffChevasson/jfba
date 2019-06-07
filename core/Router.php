<?php
namespace core;

class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);
        $explode_url = explode('/', $url);
        if (count($explode_url) > 0) {
            $ctrl = ucfirst($explode_url[0]);
            if (file_exists(ROOT."/applications/controllers/".$ctrl."Controller")){
                $request->controller = $explode_url[1];
                $request->action     = $explode_url[2];
                $request->params     = array_slice($explode_url, 3);
            }else{
                $request->controller = $explode_url[2];
                $request->action     = $explode_url[3];
                $request->params     = array_slice($explode_url, 4);
            }
        }
    }
}
?>