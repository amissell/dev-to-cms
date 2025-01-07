<?php
require_once '../includes/articles_class.php';
require_once '../includes/class_category.php';
require_once '../includes/class_tags.php';
require_once '../includes/Database.php';


$articleCount = Article::getArticleCount();  
$tagCount = Tag::getTagCount();  
$categoryCount = Category::getCategoryCount();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/983fb12c47.js" crossorigin="anonymous"></script>
</head>

<body class="bg-gray-900 text-white font-sans">

  <div class="flex min-h-screen">
    <div class="w-64 bg-gray-800 p-6">
      <div class="text-yellow-500 text-6xl font-semibold mb-6"><i class="fa-brands fa-blogger"></i></div>
      <nav>
        <ul>
          <li><a href="dashboard.php" class="block py-2 px-4 hover:bg-yellow-500 rounded">Dashboard</a></li>
          <li><a href="articles.php" class="block py-2 px-4 hover:bg-yellow-500 rounded">Articles</a></li>
          <li><a href="categories.php" class="block py-2 px-4 hover:bg-yellow-500 rounded">Categories</a></li>
          <li><a href="tags.php" class="block py-2 px-4 hover:bg-yellow-500 rounded">Tags</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Authors</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Settings</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Profile</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Logout</a></li>
        </ul>
      </nav>
    </div>

    <div class="flex-1 p-8">
      <header class="flex items-center justify-between mb-8">
        <div>
          <h1 class="text-4xl text-yellow-500 font-semibold">Welcome to Your Dashboard</h1>
        </div>

        <div class="relative">
          <input type="text" placeholder="Search..." class="bg-gray-700 text-white py-2 px-4 rounded-md pl-10 focus:outline-none">
          <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="10.5" cy="10.5" r="7.5" />
            <line x1="16.5" y1="16.5" x2="22" y2="22" />
          </svg>
        </div>

        <div class="flex items-center space-x-4">
          <i class="fa-solid fa-user text-xl text-yellow-500"></i>
          <i class="fa-solid fa-envelope text-xl text-yellow-500"></i>
          <i class="fa-solid fa-bell text-xl text-yellow-500"></i>
        </div>

      </header>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Users</h2>
          <p class="text-3xl mt-2">150</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Articles</h2>
          <p class="text-3xl mt-2"><?= $articleCount ?></p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Tags</h2>
          <p class="text-3xl mt-2"><?= $tagCount ?></p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">
            <i id="add_category_btn"></i> Categories
          </h2>
          <p class="text-3xl mt-2"><?= $categoryCount ?></p>
        </div>
      </div>

      <div class="mt-8 p-6 bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl text-yellow-500 mb-4">Top Authors</h2>
        <p>Authors.</p>
      </div>
      <div class="mt-8 p-6 bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl text-yellow-500 mb-4">Most Read Articles</h2>
        <p>Articles.</p>
      </div>
    </div>
  </div>

  <!-- <div class="container mx-auto p-6">
    <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
      <h2 class="text-2xl text-yellow-500 mb-4">
        <button id="" class="fa-solid fa-plus"></button> Add Category
      </h2>
      <form id="categoryForm" action="dashboard.php" method="post" class="">
        <div class="field_category mb-4">
          <label class="text-white">The name of category</label>
          <input type="text" name="name_category" class="form-control p-2 rounded-lg w-full" required>
        </div>
        <button type="submit" name="save_category_btn" class="btn_save bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition duration-300">Add Category</button>
      </form>
    </div>
  </div> -->

  <footer class="bg-gray-800 text-gray-400 py-4 mt-8 text-center">
    <p>&copy; 2025.</p>
    <div class="mt-2 space-x-4">
      <a href="#" class="hover:text-yellow-500">Privacy Policy</a>
      <a href="#" class="hover:text-yellow-500">Terms of Service</a>
      <a href="#" class="hover:text-yellow-500">Contact Us</a>
    </div>
  </footer>

  <script>
    document.getElementById("add_category_btn").addEventListener("click", function() {
      var form = document.getElementById("categoryForm");
      // console.log("hhhhhhhhhhhhhh");
      
      form.classList.toggle("hidden");
    });
  </script>

</body>

</html>
