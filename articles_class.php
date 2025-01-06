<?php
require_once 'Database.php';

class Article {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addArticle($title, $slug, $content, $categoryId, $authorId, $status = 'draft', $scheduledDate = null) {
        $sql = "INSERT INTO articles (title, slug, content, category_id, author_id, status, scheduled_date) 
                VALUES (:title, :slug, :content, :category_id, :author_id, :status, :scheduled_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':author_id', $authorId);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':scheduled_date', $scheduledDate);

        return $stmt->execute();
    }

    public function getAllArticles() {
        $sql = "SELECT * FROM articles";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleById($id) {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteArticle($id) {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
