<?php
require_once 'Database.php';

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function addArticle($title, $content, $categoryId, $status, $scheduledDate, $tagIds)
    {
        $sql = "INSERT INTO articles (title, content, category_id, status, scheduled_date) 
            VALUES (:title, :content, :category_id, :status, :scheduled_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':scheduled_date', $scheduledDate);

        if ($stmt->execute()) {
            $articleId = $this->db->lastInsertId();

            foreach ($tagIds as $tagId) {
                $sql = "INSERT INTO article_tags (article_id, tag_id) VALUES (:article_id, :tag_id)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':article_id', $articleId);
                $stmt->bindParam(':tag_id', $tagId);
                $stmt->execute();
            }

            return true;
        }
        return false;
    }


    public function getAllArticles()
    {
        $sql = "
        SELECT 
            a.id,
            a.title,
            a.content,
            c.name AS category_name,
            GROUP_CONCAT(t.name SEPARATOR ', ') AS tags
        FROM 
            articles a
        LEFT JOIN 
            categories c ON a.category_id = c.id
        LEFT JOIN 
            article_tags at ON a.id = at.article_id
        LEFT JOIN 
            tags t ON at.tag_id = t.id
        GROUP BY 
            a.id
    ";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getArticleById($id)
    {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateArticle($id, $title, $content, $categoryId, $status, $scheduledDate, $tagIds)
    {
        $sql = "UPDATE articles SET title = :title, content = :content, category_id = :category_id, tag_ids = :tag_ids
                status = :status, scheduled_date = :scheduled_date WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category_id', $categoryId);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':scheduled_date', $scheduledDate);
        $stmt->bindParam(':tag_ids', $tagIds);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    public function deleteArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }


    // to cont the articles
public function countArticles()
{
    $sql = "SELECT COUNT(*) FROM articles";
    $stmt = $this->db->query($sql);
    return $stmt->fetchColumn();
}


// In articles_class.php
public static function getArticleCount() {
    $db = Database::getInstance();  // Ensure this is getting the database connection
    $query = "SELECT COUNT(*) FROM articles";
    $result = $db->query($query);
    return $result->fetchColumn();  // Assuming it's a PDO connection
}


}
