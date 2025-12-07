<?php

class History extends Controller {

    private $data = [
        "title" => "History Peminjaman"
    ];

    public function index() {
        $user_id = $_COOKIE['id'];
        $history_list = $this->model("Lend_model")->getUserHistory($user_id);
        $this->data['history'] = array_map(function($history) {
        return [
            'book' => $this->model("Book_model")->getBookById($history['book_id']),
            'is_expired' => (date("Y-m-d H:i:s") > $history['expired_date']),
            'lend_date' => $history['lend_date'],
            'expired_date' => $history['expired_date']
        ];
    }, $history_list);
        $this->view('templates/header', $this->data);
        $this->view("user/view_history", $this->data);
        $this->view("templates/footer");
    }

}