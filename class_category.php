<?php
require_once 'Database.php';

class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function addCategory($categoryName) {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':name', $categoryName);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function getCategoryById($id) {
      $sql = "SELECT * FROM categories WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
  
      return $stmt->fetch(PDO::FETCH_ASSOC); 
  }
  
  
  public function updateCategory($id, $newName) {
    $sql = "UPDATE categories SET name = :name WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':name', $newName);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        return true; 
    }
    return false; 
}

}
?>
