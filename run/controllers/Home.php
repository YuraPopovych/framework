<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 15.04.2018
 * Time: 9:42
 */

class Home extends Controller
{
    public function index($name = ''){
        $user = $this->model('User');
        $user -> name = $name;

        $this->view('home/index', ['name' => $user -> name ]);
    }



}