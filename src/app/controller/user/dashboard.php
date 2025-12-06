<?php

class Dashboard extends Controller {

    private $data = [
        "title" => "User Dashboard"
    ];

    public function index() {
        $this->view('templates/header', $this->data);
        $this->view("user/view_dashboard_user", $this->data);
        $this->view("templates/footer");
    }
}