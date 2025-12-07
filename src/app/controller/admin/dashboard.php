<?php

class Dashboard extends Controller {
    protected $data = [
        "title" => "Admin Dashboard"
    ];

    public function index() {
        $this->data["total_user"] = count($this->model("User_model")->getAllUsers());
        $this->data['total_book'] = count($this->model("Book_model")->getAllBooks());
        $this->data['total_lend'] = count($this->model("Lend_model")->getAllActiveLend());
        $this->view('templates/header', $this->data);
        $this->view("admin/view_dashboard_admin", $this->data);
        $this->view("templates/footer");
    }
}