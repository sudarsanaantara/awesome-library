<?php

class Pengguna extends Controller {
    private $data = [
        "title" => "Daftar Pengguna"
    ];

    public function index() {
        $this->view('templates/header', $this->data);
        $this->view("admin/view_users");
        $this->view("templates/footer");
    }
}