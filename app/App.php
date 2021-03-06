<?php
class App{

    private $__controller, $__action, $__params;
    public function __construct()
    {
        global $routes;
        if (!empty($routes['default_controller'])){
            $this ->__controller = $routes['default_controller'];
        }
        if (!empty($routes['default_action'])){
            $this ->__action = $routes['default_action'];
        }
        $this ->__params = [];
        $this ->handleUrl();
    }

    public function handleUrl() {
        $url = $this ->getUrl();
        $urlArr = array_filter(explode('/',$url));
        $urlArr = array_values($urlArr);

            //handle controller
            if (!empty($urlArr[0]) ){
                $this ->__controller = ucfirst($urlArr[0]);
            }else{
                $this ->__controller = ucfirst($this ->__controller);
            }

            if (file_exists('app/controllers/'.($this->__controller).'.php')){ //bug file exist
                require_once 'controllers/'.($this->__controller).'.php';
                if (class_exists($this->__controller)){
                    $this ->__controller = new $this ->__controller();
                    unset($urlArr[0]);
                    }else{
                        echo 'err';
                    }
            } else{
                echo 'err';
            }

            //handle action
            if (!empty($urlArr[1])){
                $this -> __action = $urlArr[1];
                unset($urlArr[1]);
            }

            //handle param
            $this -> __params = array_values($urlArr);

            //check action existed
            if (method_exists($this->__controller, $this->__action)){
                call_user_func([$this ->__controller, $this -> __action],$this -> __params);
            }else{
                echo 'err';
            }
    }

    function getUrl(){
        if (!empty($_SERVER['PATH_INFO'])){
            $url = $_SERVER['PATH_INFO'];
        }else{
            $url = '/';
        }
        return $url;
    }
}