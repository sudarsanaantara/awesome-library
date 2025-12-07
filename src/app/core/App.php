<?php
class App
{
    protected $controller = "login";
    protected $role = "guest";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        require_once 'src/app/model/User_model.php';
        $user_db = new User_model;

        $url = $this->parseURL() ?? [(isset($_SESSION['login']) ? $_SESSION['role'] : 'login'), "dashboard"];

        if (isset($_SESSION['login']) && isset($_COOKIE['id'])) {
            if ($_SESSION['login'] = true) {
                if ($_SESSION['role'] != $url[0]) {
                    $this->role = "guest";
                    $this->controller = isset($url[1]) ? $url[1] : $url[0];
                    if (!file_exists("src/app/controller/" . $this->role . "/" . $this->controller . ".php")) $this->controller = "NotFound";
                } else {
                    $user = $user_db->getUserById($_COOKIE['id']);
                    if ($user) {
                        if ($_COOKIE['key'] == hash("sha256", $user['password'] . $user['username']));
                        if (!isset($url[1])) $url[1] = "dashboard";
                        if (file_exists("src/app/controller/" . $_SESSION['role'] . "/" . $url[1] . ".php")) {
                            $this->controller = $url[1];
                            $this->role = $_SESSION['role'];
                            unset($url[1]);
                        } else {
                            $this->controller = "NotFound";
                            unset($url[1]);
                        }
                    }
                }
            }
        } else {
            $this->role = "guest";
            if (isset($url[0])) {
                $this->controller = $url[0];
                unset($url[0]);
            }
            if (!file_exists("src/app/controller/" . $this->role . "/" . $this->controller . ".php")) $this->controller = "NotFound";
        }

        require_once 'src/app/controller/' . $this->role . '/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        unset($url[0]);

        if ($this->role == "guest") {
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
        } else {
            if (isset($url[2])) {
                if (method_exists($this->controller, $url[2])) {
                    $this->method = $url[2];
                    unset($url[2]);
                }
            }
        }

        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}
