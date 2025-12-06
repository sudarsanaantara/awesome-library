<?php
class Controller {
    public function view($view, $data=[]) {
        require_once 'src/app/views/' . $view . '.php';
    }

    public function model($model) {
        require_once 'src/app/model/' . $model . '.php';
        return new $model;
    }
}