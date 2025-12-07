<?php
class Book_model
{
    private $tb_book = "tb_book";
    private $tb_category = "tb_category";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getCategoryBookLists() {
        $this->db->query("SELECT * FROM " . $this->tb_category);
        return $this->db->getAllResults();
    }

    public function getAllBooks() {
        $this->db->query("SELECT * FROM " . $this->tb_book . " ORDER BY id DESC");
        return $this->db->getAllResults();
    }

    public function getBookById($id) {
        $this->db->query("SELECT * FROM " . $this->tb_book . " WHERE id=:id");
        $this->db->bind("id", $id);
        return $this->db->getSingleResult();
    }

    public function searchBooksByInformation($info) {
        $pattern = '%' . trim($info) . '%';
        $this->db->query("SELECT * FROM " . $this->tb_book . " WHERE title LIKE :info OR author LIKE :info");
        $this->db->bind("info", $pattern);
        $result = $this->db->getAllResults();
        return $result;
    }

    public function addNewBook($data) {
        $this->db->query("INSERT INTO " . $this->tb_book . " (title, author, category_id, book_link) VALUES (:title, :author, :category_id, :book_link)");
        $this->db->bind("title", $data['title']);
        $this->db->bind("author", $data['author']);
        $this->db->bind("category_id", $data['category_id']);
        $this->db->bind("book_link", $data['book_link']);
        return $this->db->getSingleResult();
    }

    public function deleteBook($id) {
        $this->db->query("DELETE FROM " . $this->tb_book . " WHERE id=:id");
        $this->db->bind("id", $id);
        $result = $this->db->getSingleResult();
        return $result;
    }
}