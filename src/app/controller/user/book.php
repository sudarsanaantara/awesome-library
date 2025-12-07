<?php
class Book extends Controller {
    private $data = [
        "title" => "Halaman Buku",
        "is_lended" => false
    ];

    public function index($id=null) {
        if ($id == null) {
            header("location: " . BASEURL . "/notfound");
            die();
        }

        $this->data['book'] = $this->model("Book_model")->getBookById($id);

        if (!$this->data['book']) {
            header("location: " . BASEURL . "/notfound");
            die();
        }

        $user_id = $_COOKIE['id'];
        $this->data['is_lended'] = $this->model("Lend_model")->isUserLendABook($user_id, $id);

        $this->view('templates/header', $this->data);
        $this->view("user/view_book", $this->data);
        $this->view("templates/footer"); 
    }

    public function lend($id=null) {
        if ($id == null) {
            header("location: " . BASEURL . "/notfound");
            die();
        }
        $user_id = $_COOKIE['id'];
        $this->model("Lend_model")->addLend($user_id, $id);
        header("location: " . BASEURL . "/user/book/" . $id);
        die();
    }
}