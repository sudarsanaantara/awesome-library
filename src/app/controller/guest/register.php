<?php

class Register extends Controller
{
    private $data = [
        "title" => "Halaman Register",
        "message" => null
    ];

    public function index()
    {
        $this->handleRegisterData();
        $this->view('templates/header', $this->data);
        $this->view("guest/view_registrasi", $this->data);
        $this->view("templates/footer", $this->data);
    }

    private function handleRegisterData()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fullname  = $_POST["fullname"];
            $username = $_POST["username"];
            $email  = $_POST["email"];
            $password     = $_POST["password"];
            $konfirmasi   = $_POST["confirmPassword"];

            $this->data['failed'] = true;
            if (strlen($fullname) > 200) {
                $this->data['message'] = "❌ Namamu terlalu panjang, pastikan nama kurang dari 200 karakter";
            } else if (strlen($username) > 50) {
                $this->data['message'] = "❌ Username terlalu panjang, pastikan username kurang dari 50 karakter";
            } else if (strlen($email) > 100) {
                $this->data['message'] = "❌ Emailmu terlalu panjang, pastikan email kurang dari 100 karakter";
            } else if ($password !== $konfirmasi) {
                $this->data['message'] = "❌ Password dan konfirmasi password tidak sama!";
            } else {
                if ($this->model("User_model")->getUserByUsername($username)) {
                    $this->data['message'] = "❌ Username yang anda gunakan telah tersedia, silakan gunakan yang lain!";
                } else if ($this->model("User_model")->getUserByEmail($email)) {
                    $this->data['message'] = "❌ Email yang anda gunakan sudah terdaftar, silakan login!";
                } else {
                    $this->data['failed'] = false;
                    $this->data['message'] = "Registrasi berhasil! Silakan login.";
                    $data_to_insert = [
                        "fullname" => $fullname,
                        "username" => $username,
                        "email" => $email,
                        "password" => $password
                    ];
                    $this->model("User_model")->addUser($data_to_insert);
                }
            }
        }
    }
}
