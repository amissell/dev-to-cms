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
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Dashboard</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Articles</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Categories</a></li>
          <li><a href="#" class="block py-2 px-4 hover:bg-yellow-500 rounded">Tags</a></li>
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

      </header>

      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Users</h2>
          <p class="text-3xl mt-2">150</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Articles</h2>
          <p class="text-3xl mt-2">75</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">Tags</h2>
          <p class="text-3xl mt-2">Tag</p>
        </div>
        <div class="bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
          <h2 class="text-2xl text-yellow-500">
            <button type="submit" class= "fa-solid fa-plus"></button>Categories
          </h2>
          <p class="text-3xl mt-2">Categories</p>
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
  <footer class="bg-gray-800 text-gray-400 py-4 mt-8 text-center">
    <p>&copy; 2025 Your Blog Name. All rights reserved.</p>
    <div class="mt-2 space-x-4">
      <a href="#" class="hover:text-yellow-500">Privacy Policy</a>
      <a href="#" class="hover:text-yellow-500">Terms of Service</a>
      <a href="#" class="hover:text-yellow-500">Contact Us</a>
    </div>
  </footer>

</body>

</html>