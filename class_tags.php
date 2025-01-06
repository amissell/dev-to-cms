<?php
require_once 'Database.php';

class Tag {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addTag($tagName) {
        $sql = "INSERT INTO tags (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $tagName);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllTags() {
        $sql = "SELECT * FROM tags";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTagById($id) {
        $sql = "SELECT * FROM tags WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function updateTag($id, $newName) {
        $sql = "UPDATE tags SET name = :name WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $newName);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true; 
        }
        return false; 
    }

    public function deleteTag($id) {
        $sql = "DELETE FROM tags WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
