<?php

class Pengguna extends Controller {
    protected $data = [
        "title" => "Daftar Pengguna"
    ];

    public function index() {
        $this->data["users"] = $this->model("User_model")->getAllUsersWithAdmins();

        $this->view('templates/header', $this->data);
        $this->view("admin/view_users", $this->data);
        $this->view("templates/footer");
    }

    public function hapus($id) {
        $this->model("User_model")->deleteUser($id);
        header("Location: " . BASEURL . "/admin/pengguna/");
        die();
    }
}