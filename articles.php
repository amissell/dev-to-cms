<?php
include './admin/components/top_bar.php';
require_once 'articles_class.php';
require_once 'class_category.php';
require_once 'class_tags.php';

$messageType = '';
$message = '';

$articleObj = new Article();
$categoryObj = new Category();
$tagObj = new Tag();

$categories = $categoryObj->getAllCategories();
$tags = $tagObj->getAllTags();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_article'])) {
  // Sanitize user input to prevent XSS and other attacks
  $title = htmlspecialchars(trim($_POST['title']));
  $content = htmlspecialchars(trim($_POST['content']));
  $categoryId = $_POST['category_id'];
  $tagIds = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];
  $status = 'draft';
  $scheduledDate = date('Y-m-d H:i:s');

  // Check for empty fields
  if (empty($title) || empty($content) || empty($categoryId)) {
    $message = "Title, content, and category are required!";
    $messageType = "error";
  } else {
    if ($articleObj->addArticle($title, $content, $categoryId, $status, $scheduledDate, $tagIds)) {
      $message = "Article added successfully!";
      $messageType = "success";
    } else {
      $message = "Failed to add article.";
      $messageType = "error";
    }
  }
}

// Delete article
if (isset($_GET['delete_id'])) {
  $articleId = $_GET['delete_id'];
  if ($articleObj->deleteArticle($articleId)) {
      $message = "Article deleted successfully!";
      $messageType = "success";
  } else {
      $message = "Failed to delete article.";
      $messageType = "error";
  }
}

// Edit article logic
if (isset($_GET['edit_id'])) {
  $articleId = $_GET['edit_id'];
  $article = $articleObj->getArticleById($articleId); // Implement getArticleById in the Article class
}

$articles = $articleObj->getAllArticles();


// Fetch counts of articles, categories, and tags
$articleCount = $articleObj->countArticles();
$categoryCount = $categoryObj->countCategories();
$tagCount = $tagObj->countTags();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Manage Articles</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/983fb12c47.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-900 text-white font-sans">
  <div class="flex min-h-screen">
    <?php include './admin/components/side_bar.php'; ?>
    <div class="flex-1 p-8">
      <header class="mb-8">
        <h2 class="text-4xl text-yellow-500 font-semibold">Manage Articles</h2>
      </header>

      <div class="bg-gray-800 p-6 rounded-lg shadow-md mb-8">
        <h3 class="text-2xl text-yellow-500 mb-4">Add/Edit Article</h3>
        <form action="articles.php" method="POST">
          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
            <input type="text" id="title" name="title" required
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500" 
              value="<?= isset($article) ? htmlspecialchars($article['title']) : ''; ?>">
          </div>
          <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-300">Content</label>
            <textarea id="content" name="content" rows="5" required
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500"><?= isset($article) ? htmlspecialchars($article['content']) : ''; ?></textarea>
          </div>
          <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-300">Category</label>
            <select id="category_id" name="category_id" multiple
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
              <?php foreach ($categories as $category): ?>
                <option value="<?= $category['id']; ?>" <?= isset($article) && $article['category_id'] == $category['id'] ? 'selected' : ''; ?>>
                  <?= htmlspecialchars($category['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-4">
            <label for="tag_ids" class="block text-sm font-medium text-gray-300">Tags</label>
            <select id="tag_ids" name="tag_ids[]" multiple
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
              <?php foreach ($tags as $tag): ?>
                <option value="<?= $tag['id']; ?>" <?= isset($article) && in_array($tag['id'], explode(',', $article['tags'])) ? 'selected' : ''; ?>>
                  <?= htmlspecialchars($tag['name']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div>
            <button type="submit" name="add_article"
              class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
              <?= isset($article) ? 'Update Article' : 'Add Article'; ?>
            </button>
          </div>
        </form>
      </div>

      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-2xl text-yellow-500 mb-4">Existing Articles</h3>
        <ul class="space-y-4">
          <?php foreach ($articles as $article): ?>
            <li class="py-3 border-b border-gray-600 flex justify-between">
              <div>
                <strong class="text-yellow-500">Title: </strong> <?= htmlspecialchars($article['title']); ?><br>
                <strong class="text-gray-300">Category: </strong> <?= htmlspecialchars($article['category_name']); ?><br>
                <strong class="text-gray-300">Content: </strong> <?= htmlspecialchars($article['content']); ?><br>
                <strong class="text-gray-300">Tags: </strong> <?= htmlspecialchars($article['tags']); ?><br>
              </div>
              <div>
                <a href="articles.php?delete_id=<?= $article['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Delete</a>
              </div>
              <div>
                <a href="articles.php?edit_id=<?= $article['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Edit</a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <?php include './admin/components/footer.php'; ?>
</body>
</html>
