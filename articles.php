<?php
require_once 'articles_class.php';
require_once 'Tag.php';
require_once 'Category.php';

$articleObj = new Article();
$tagObj = new Tag();
$categoryObj = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_article'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category_id'];
        $tagIds = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];

        $result = $articleObj->addArticle($title, $content, $categoryId, $tagIds);
        if ($result) {
            echo "Article added successfully.";
        } else {
            echo "Failed to add article.";
        }
    }

    if (isset($_POST['update_article'])) {
        $articleId = $_POST['article_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $categoryId = $_POST['category_id'];
        $tagIds = isset($_POST['tag_ids']) ? $_POST['tag_ids'] : [];

        $result = $articleObj->updateArticle($articleId, $title, $content, $categoryId, $tagIds);
        if ($result) {
            echo "Article updated successfully.";
        } else {
            echo "Failed to update article.";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $article = $articleObj->getArticleById($_GET['id']);
        if ($article) {
            echo "<h1>" . $article['title'] . "</h1>";
            echo "<p>" . $article['content'] . "</p>";
        } else {
            echo "Article not found.";
        }
    } else {
        $articles = $articleObj->getAllArticles();
        foreach ($articles as $article) {
            echo "<h2><a href='?id=" . $article['id'] . "'>" . $article['title'] . "</a></h2>";
        }
    }
}
?>
