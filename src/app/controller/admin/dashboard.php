<?php

class Dashboard extends Controller {
    private $data = [
        "title" => "Admin Dashboard"
    ];

    public function index() {
        $this->view('templates/header', $this->data);
        $this->view("admin/view_dashboard_admin", $this->data);
        $this->view("templates/footer");
    }
}