<?php

class NotFound extends Controller {
    private $data = [
        "title" => "404 NOT FOUND"
    ];

    public function index() {
        $this->view('templates/header', $this->data);
        $this->view("guest/not_found", $this->data);
        $this->view('templates/footer', $this->data);
    }
}