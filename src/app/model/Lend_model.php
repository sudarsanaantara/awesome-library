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
        $this->db->query("SELECT * FROM " . $this->tb_name);
        $result = $this->db->getAllResults();
        return $result;
    }
}