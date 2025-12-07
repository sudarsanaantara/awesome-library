<?php
class Tambah_Buku extends Controller {
    protected $data = [
        "title" => "Koleksi Buku",
        "subtitle" => "Tambah Buku Baru",
        "message" => ""
    ];

    public function index() {
        $this->data["kategori_buku"] = $this->model("Book_model")->getCategoryBookLists();
        $this->handleAddBuku();
        $this->view('templates/header', $this->data);
        $this->view("admin/view_tambah_buku", $this->data);
        $this->view("templates/footer", $this->data);
    }


    private function handleAddBuku() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST["judul"]) && isset($_POST['penulis']) && isset($_POST['book_category']) && isset($_POST['link_buku'])) {
                $insert_data = [
                    "title" => $_POST['judul'],
                    "author" => $_POST['penulis'],
                    "category_id" => $_POST['book_category'],
                    "book_link"  => $_POST['link_buku']
                ];
                try {
                    $this->model("Book_model")->addNewBook($insert_data);
                    $this->data['message'] = "Buku berjudul " . $insert_data['title'] . " berhasil ditambahkan ke dalam daftar!";
                    $this->data['failed'] = false;
                } catch(Exception $e) {
                    $this->data['message'] = "Gagal menambahan buku ke dalam database!";
                    $this->data['failed'] = true;
                }
            }
        }
    }
}