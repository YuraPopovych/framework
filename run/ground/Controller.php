<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.04.2018
 * Time: 9:33
 */

class Controller
{
    public function model($model){
        require_once '../run/models/' . $model. '.php';
        return new $model;
    }
    public function view($view, $data = []){
        require_once '../run/views/' . $view . '.php';
    }
}