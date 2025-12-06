<?php

class Logout extends Controller {
    public function index() {
            session_unset();
            session_destroy();
            setcookie("id", "");
            setcookie("key", "");
            header("Location: " . BASEURL);
            exit();
    }
}