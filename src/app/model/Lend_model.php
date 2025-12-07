<?php
class Lend_model
{
    private $tb_name = "tb_lending";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllActiveLend() {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE expired_date > :date");
        $this->db->bind("date", date("Y-m-d H:i:s"));
        $result = $this->db->getAllResults();
        return $result;
    }

    public function addLend($user_id, $book_id) {
        $this->db->query("INSERT INTO " . $this->tb_name . " (user_id, book_id, lend_date, expired_date) VALUES (:user_id, :book_id, :lend_date, :expired_date)");
        $this->db->bind("user_id", $user_id);
        $this->db->bind("book_id", $book_id);
        $this->db->bind("lend_date", date("Y-m-d H:i:s"));
        $this->db->bind("expired_date", date('Y-m-d H:i:s', strtotime('+1 day')));
        $result = $this->db->getAllResults();
        return $result;
    }

    public function isUserLendABook($user_id, $book_id) {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE user_id=:user_id AND book_id=:book_id AND expired_date > :date");
        $this->db->bind("user_id", $user_id);
        $this->db->bind("book_id", $book_id);
        $this->db->bind("date", date("Y-m-d H:i:s"));
        $result = $this->db->getSingleResult();
        return $result;
    }

    public function getUserHistory($user_id) {
        $this->db->query("SELECT * FROM " . $this->tb_name . " WHERE user_id=:user_id");
        $this->db->bind("user_id", $user_id);
        $result = $this->db->getAllResults();
        return $result;
    }
}