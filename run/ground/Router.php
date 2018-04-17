<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.04.2018
 * Time: 9:27
 */
class Router {

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function getUrl(){

        if(isset($_GET['url'])) {
            return $url = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));

        }
    }


    public function __construct()
    {
        $url = $this->getUrl();



        if(file_exists('../run/controllers/'. $url[0]. '.php')){
            $this -> controller = $url[0];
            unset($url[0]);
        }
        require_once '../run/controllers/' . $this->controller . '.php';
        $this -> controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this ->method = $url[1];
                unset($url[1]);
            }

        }

        $this->params=$url ? array_values($url): [];
        call_user_func_array([$this->controller,$this->method], $this->params);
    }


}