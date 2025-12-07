<?php

class Koleksi_Buku extends Controller {
    protected $data = [
        "title" => "Koleksi Buku"
    ];

    public function index() {
        $this->data['books'] = $this->model("Book_model")->getAllBooks();
        $this->data["kategori_buku"] = $this->model("Book_model")->getCategoryBookLists();
        
        $this->view('templates/header', $this->data);
        $this->view("admin/view_collection", $this->data);
        $this->view("templates/footer");
    }

    public function hapus($id) {
        $this->model("Book_model")->deleteBook($id);
        header("Location: " . BASEURL . "/admin/koleksi_buku/");
        die();
    }
}