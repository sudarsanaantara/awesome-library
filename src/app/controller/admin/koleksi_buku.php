<?php

class Koleksi_Buku extends Controller {
    private $data = [
        "title" => "Koleksi Buku"
    ];

    public function index() {
        $this->view('templates/header', $this->data);
        $this->view("admin/view_collection");
        $this->view("templates/footer");
    }
}