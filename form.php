<?php
require_once __DIR__ . '/category.php';

if (isset($_POST['save_category_btn'])) {
    $categoryName = trim($_POST['name_category']);

    if (!empty($categoryName)) {
        $categoryManager = new CategoryManager();
        $categoryManager->addCategory($categoryName);
        header("Location: dashboard.php"); 
    } else {
        $error = "Category name cannot be empty.";
    }
}

$categoryManager = new CategoryManager();
$categories = $categoryManager->getAllCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Category</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mx-auto p-6">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
      <h2 class="text-2xl text-yellow-500 mb-4">
        <button class="fa-solid fa-plus"></button> Add Category
      </h2>
      <form action="dashboard.php" method="post">
        <div class="field_category mb-4">
          <label class="text-white">The name of category</label>
          <input type="text" name="name_category" class="form-control p-2 rounded-lg w-full" required>
        </div>
        <button type="submit" name="save_category_btn" class="btn_save bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Add Category</button>
      </form>
    </div>
  </div>



  <script>
    document.getElementById("add-category-btn").addEventListener("click", function() {
      var form = document.getElementById("category-form");
      form.classList.toggle("hidden");
    });
  </script>
</body>
</html>
