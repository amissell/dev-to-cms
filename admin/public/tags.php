<?php include './admin/components/top_bar.php'; ?>
<?php
require_once 'class_tags.php';

$tag = new Tag();
$messageType = '';
$message = '';

if (isset($_GET['edit_id'])) {
    $tagId = $_GET['edit_id'];
    $tagDetails = $tag->getTagById($tagId); 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_tag'])) {
    if (isset($_POST['tag_name']) && !empty($_POST['tag_name'])) {
        $tagName = $_POST['tag_name'];
        if ($tag->addTag($tagName)) {
            $message = "Tag added successfully!";
            $messageType = "success";
        } else {
            $message = "Failed to add tag.";
            $messageType = "error";
        }
    }
}

$tags = $tag->getAllTags();

if (isset($_GET['delete_id'])) {
    $tagId = $_GET['delete_id'];

    if ($tag->deleteTag($tagId)) {
        $message = "Tag deleted successfully!";
        $messageType = "success";
        header("Location: tags.php");
        exit();
    } else {
        $message = "Failed to delete tag.";
        $messageType = "error";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_tag'])) {
    $id = $_POST['tag_id'];
    $newName = $_POST['tag_name'];

    if ($tag->updateTag($id, $newName)) {
        $message = "Tag updated successfully!";
        $messageType = "success";
        header("Location: tags.php");
        exit();
    } else {
        $message = "Failed to update tag.";
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
  <title>Manage Tags</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/983fb12c47.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-900 text-white font-sans">
  <div class="flex min-h-screen">
    <?php include './admin/components/side_bar.php'; ?>
    <div class="flex-1 p-8">
      <header class="mb-8">
        <h2 class="text-4xl text-yellow-500 font-semibold">Manage Tags</h2>
      </header>
      <div class="bg-gray-800 p-6 rounded-lg shadow-md">
        <h3 class="text-2xl text-yellow-500 mb-4"><?= isset($tagDetails) ? 'Edit Tag' : 'Add New Tag'; ?></h3>
        <form action="tags.php" method="POST">
          <?php if (isset($tagDetails)): ?>
            <input type="hidden" name="tag_id" value="<?= $tagDetails['id']; ?>">
          <?php endif; ?>
          <div class="mb-4">
            <label for="tag_name" class="block text-sm font-medium text-gray-300">Tag Name</label>
            <input type="text" id="tag_name" name="tag_name" value="<?= isset($tagDetails) ? htmlspecialchars($tagDetails['name']) : ''; ?>"
              required
              class="mt-1 p-3 w-full bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-yellow-500">
          </div>
          <div>
            <button type="submit" name="<?= isset($tagDetails) ? 'edit_tag' : 'add_tag'; ?>"
              class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
              <?= isset($tagDetails) ? 'Save Changes' : 'Add Tag'; ?>
            </button>
          </div>
        </form>
      </div>
      <div class="mt-8">
        <h3 class="text-2xl text-yellow-500 mb-4">Existing Tags</h3>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
          <ul class="space-y-4">
            <?php foreach ($tags as $tagItem): ?>
              <li class="py-3 border-b border-gray-600 flex justify-between">
                <div>
                  <strong class="text-yellow-500"><?= htmlspecialchars($tagItem['name']); ?></strong>
                </div>
                <div>
                  <a href="tags.php?edit_id=<?= $tagItem['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Edit</a>
                  <a href="tags.php?delete_id=<?= $tagItem['id'] ?>" class="text-yellow-500 hover:text-yellow-300">Delete</a>
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