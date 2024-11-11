<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Chatting Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50 font-sans">

  <!-- Navbar -->
  <nav class="flex justify-between items-center p-6">
    <div class="text-2xl font-bold text-blue-700">LOGO</div>
    <ul class="hidden md:flex space-x-6 text-gray-600">
      <li><a href="#" class="hover:text-blue-600">Home</a></li>
      <li><a href="#" class="hover:text-blue-600">About</a></li>
      <li><a href="#" class="hover:text-blue-600">Service</a></li>
      <li><a href="#" class="hover:text-blue-600">Contact Us</a></li>
      <li><a href="#" class="hover:text-blue-600">FAQ</a></li>
    </ul>
    <!-- Mobile Menu Button -->
    <button class="md:hidden text-gray-600 focus:outline-none">
      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </nav>

  <!-- Hero Section -->
  <section class="flex flex-col md:flex-row items-center px-6 md:px-8 py-10 md:py-20">
    <!-- Illustration -->
    <div class="flex-1 flex justify-center mb-8 md:mb-0">
      <div class="relative w-48 h-72 md:w-60 md:h-96 bg-blue-100 rounded-lg shadow-lg">
        <div class="absolute top-3 left-3 w-40 h-64 md:w-52 md:h-80 bg-blue-50 rounded-lg shadow-inner"></div>
        <!-- Chat Bubbles -->
        <div class="absolute top-10 left-8 w-32 md:w-40 p-3 md:p-4 bg-blue-400 text-white rounded-lg shadow-md">
          <p class="text-xs md:text-sm">Hello! How can I help you?</p>
        </div>
        <div class="absolute bottom-12 right-6 w-32 md:w-40 p-3 md:p-4 bg-yellow-400 text-white rounded-lg shadow-md">
          <p class="text-xs md:text-sm">I'm looking for some information.</p>
        </div>
      </div>
    </div>

    <!-- Text Content -->
    <div class="flex-1 text-center md:text-left">
      <h1 class="text-3xl md:text-4xl font-bold text-blue-700 mb-4">Online Chatting</h1>
      <p class="text-gray-600 mb-6 text-sm md:text-base">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed diam nonummy nibh euismod tincidunt ut.
      </p>
      <div class="flex justify-center md:justify-start space-x-4">
        <button class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 text-sm md:text-base">Get started</button>
        <button class="bg-gray-200 text-blue-600 py-2 px-4 rounded hover:bg-gray-300 text-sm md:text-base">Free Trial 30 Days</button>
      </div>
    </div>
  </section>

</body>
</html>
