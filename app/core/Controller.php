<?php


class Controller {

    public function view($view, $data = []){
        require_once '../app/views/' . $view . '.php';
    }

    public function views($view, $data){
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model){
        require_once '../app/models/' . $model . '.php';
        $mode = new $model();
        return $mode;
    }

}