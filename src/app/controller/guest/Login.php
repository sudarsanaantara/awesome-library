<?php
class Login extends Controller
{
    private $data = [
        "title" => "Halaman Login"
    ];

    public function index()
    {
        $this->handleLoginData();
        $this->view('templates/header', $this->data);
        $this->view("guest/view_login", $this->data);
        $this->view('templates/footer', $this->data);
    }

    private function handleLoginData()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = $_POST['username'];
                $pass = $_POST['password'];

                $user = $this->model("User_model")->loginTest($username, $pass);
                if ($user) {
                    if ($user['is_admin']) {
                        $_SESSION["login"] = true;
                        $_SESSION['role'] = 'admin';
                        header("Location: " . BASEURL . "/admin/dashboard");
                    } else {
                        $_SESSION["login"] = true;
                        $_SESSION["role"] = "user";
                        header("Location: " . BASEURL . "/user/dashboard");
                    }
                    setcookie("id", $user['id']);
                    setcookie("key", hash("sha256", $user['password'] . $user['username']));
                    exit();
                } else {
                    $this->data['message'] = "❌ Username atau password salah!";
                    $this->data['failed'] = true;
                }
            }
        }
    }
}
