<?php
require_once 'Database.php';

class Article {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addArticle($title, $content, $categoryId, $authorId, $status = 'draft', $scheduledDate = null) {
    
    $sql = "INSERT INTO articles (title, content, category_id, author_id, status, scheduled_date) 
            VALUES (:title, :content, :category_id, :author_id, :status, :scheduled_date)";
    
    $x = $this->db->prepare($sql);
    
    $x->bindParam(':title', $title);
    $x->bindParam(':content', $content);
    $x->bindParam(':category_id', $categoryId);
    // $x->bindParam(':author_id', $authorId);
    $x->bindParam(':status', $status);
    $x->bindParam(':scheduled_date', $scheduledDate);

}
    public function getAllArticles() {
        $sql = "SELECT * FROM articles";
        
        $x = $this->db->query($sql);
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>