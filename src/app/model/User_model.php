<?php
class User_model
{
    private $tb_name = "tb_user";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUsers()
    {
        $this->db->query("SELECT * FROM " . $this->tb_name);
        return $this->db->getAllResults();
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE id=:id");
        $this->db->bind("id", $id);

        $result = $this->db->getSingleResult();
        return $result;
    }

    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE username=:username");
        $this->db->bind("username", $username);

        $result = $this->db->getSingleResult();
        return $result;
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE email=:email");
        $this->db->bind("email", $email);

        $result = $this->db->getSingleResult();
        return $result;
    }

    public function addUser($data)
    {
        $this->db->query("INSERT INTO " . $this->tb_name . "(fullname, username, email, password, is_admin) VALUES (:fullname, :username, :email, :password, 0);");
        $this->db->bind("fullname", $data['fullname']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("email", $data['email']);
        $this->db->bind("password", $data['password']);

        $result = $this->db->getSingleResult();
        var_dump($result);
    }

    public function loginTest($username, $password)
    {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE username=:username AND password=:password");
        $this->db->bind("username", $username);
        $this->db->bind("password", $password);

        $result = $this->db->getSingleResult();
        return $result;
    }
}
