<?php

class Dashboard extends Controller {

    private $data = [
        "title" => "User Dashboard"
    ];

    public function index() {
        $this->data['rekomendasi_buku'] = $this->model("Book_model")->getAllBooks();
        $this->handleSearchBook();
        $this->view('templates/header', $this->data);
        $this->view("user/view_dashboard_user", $this->data);
        $this->view("templates/footer");
    }

    private function handleSearchBook() {
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if ( isset($_POST["information"]) ) {
                $info = $_POST['information'];
                $this->data['rekomendasi_buku'] = $this->model("Book_model")->searchBooksByInformation($info);
            }
        }
    }
}