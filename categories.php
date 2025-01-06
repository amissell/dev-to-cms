<?php include './admin/components/top_bar.php'; ?>
<?php
require_once 'class_category.php';

$category = new Category();
$messageType = '';
$message = '';

if (isset($_GET['edit_id'])) {
  $categoryId = $_GET['edit_id'];
  $categoryDetails = $category->getCategoryById($categoryId); 
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['category_name']) && !empty($_POST['category_name'])) {
    $categoryName = $_POST['category_name'];
    if ($category->addCategory($categoryName)) {
      $message = "Category added successfully!";
      $messageType = "success";
    } else {
      $message = "Failed to add category.";
      $messageType = "error";
    }
  }
}

$categories = $category->getAllCategories();

if (isset($_GET['delete_id'])) {
  $categoryId = $_GET['delete_id'];

  if ($category->deleteCategory($categoryId)) {
    $message = "Category added successfully!";
    $messageType = "success";
    header("Location: categories.php");
    exit();
  } else {
    $message = "Failed to add category.";
    $messageType = "error";
  }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_category'])) {
  $id = $_POST['category_id'];
  $newName = $_POST['category_name'];

  if ($category->updateCategory($id, $newName)) {
    $message = "Category updated successfully!";
    $messageType = "success";
    header("Location: categories.php");
    exit(); 
  } else {
    $message = "Failed to update category.";
    $messageType = "error";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Categories</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/983fb12c47.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-900 text-white font-sans">
  <div class="flex min-h-screen">
    <?php include './admin/components/side_bar.php'; ?>
    <div class="flex-1 p-8">
      <header class="mb-8">
        <h2 class="text-4xl text-yellow-500 font-semibold">Manage Categories</h2>
      </header>
      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-2xl text-yellow-500 mb-4"><?= isset($categoryDetails) ? 'Edit Category' : 'Add New Category'; ?></h3>
        <form action="categories.php" method="POST">
          <?php if (isset($categoryDetails)): ?>
            <input type="hidden" name="category_id" value="<?= $categoryDetails['id']; ?>">
          <?php endif; ?>
          <div class="mb-4">
            <label for="category_name" class="block text-sm font-medium text-gray-300">Category Name</label>
            <input type="text" id="category_name" name="category_name" value="<?= isset($categoryDetails) ? htmlspecialchars($categoryDetails['name']) : ''; ?>"
              required
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
          </div>
          <div>
            <button type="submit" name="<?= isset($categoryDetails) ? 'edit_category' : 'add_category'; ?>"
              class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
              <?= isset($categoryDetails) ? 'Save Changes' : 'Add Category'; ?>
            </button>
          </div>
        </form>
      </div>
      <div class="mt-8">
        <h3 class="text-2xl text-yellow-500 mb-4">Existing Categories</h3>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <ul class="space-y-4">
            <?php foreach ($categories as $categoryItem): ?>
              <li class="py-3 border-b border-gray-600 flex justify-between">
                <div>
                  <strong class="text-yellow-500"><?= htmlspecialchars($categoryItem['name']); ?></strong>
                </div>
                <div>
                  <a href="categories.php?edit_id=<?= $categoryItem['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Edit</a>
                  <a href="categories.php?delete_id=<?= $categoryItem['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Delete</a>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <?php include './admin/components/footer.php'; ?>
</body>

</html>