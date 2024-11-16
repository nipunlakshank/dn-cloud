<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Chatting Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="transition-colors font-sans" id="body">
  <div class="container mx-auto  sm:max-w-full md:max-w-full lg:max-w-full xl:max-w-full 2xl:max-w-full">
    <!-- Navbar -->
    <nav class="flex justify-between items-center p-6">
      <div class="grid grid-rows-1 grid-flow-col ">
        <img src="img/logo.png" style="width: 100px;height: 100px;" class="row-end-3 row-span-2" />
        <div class="text-3xl font-bold   text-justify mt-8 row-start-1 row-span-2 transition-colors" id="header-text">DN CLOUD</div>
      </div>

      <ul class="hidden md:flex space-x-6 text-gray-600 mr-6">

        <li class="pt-2"><a href="#" class="hover:text-white hover:bg-blue-500 p-2 rounded" id="textname1">Home</a></li>
        <li class="pt-2 hover:blue-500"><a href="/aboutus" class="hover:text-white hover:bg-blue-500 p-2 rounded" id="textname2">About</a></li>

        <li class="pt-2 hover:blue-500"><a href="/contact" class="hover:text-white hover:bg-blue-500 p-2 dark:bg-gray-800 rounded" id="textname3">Contact Us</a></li>

        <a class="bg-blue-600 text-white py-2 px-5 rounded hover:bg-blue-700 text-sm md:text-base mb-7 " href="/login">Login</a>

        <button
      class="bg-blue-600 text-white py-2 px-5 rounded hover:bg-blue-700 text-sm md:text-base mb-7 "
      onclick="cycleColors()">
      color
    </button>

      </ul>
      <!-- Mobile Menu Button -->
      <button class="md:hidden text-gray-600 focus:outline-none">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
          <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </nav>

    <!-- Hero Section -->
    <section class="flex flex-col md:flex-row items-center justify-center px-6 md:px-8 py-10 md:py-20">
      <!-- Illustration -->
      <div class="flex-1 flex justify-center align-center mb-8 md:mb-0">
        <img src="/img/homebackground.png" alt="">
      </div>

      <!-- Text Content -->
      <div class="flex-2 text-center md:text-left">
        <h1 class="text-6xxl md:text-6xl font-bold leading-tight mb-3" id="textname">Have your <br> best chat</h1>
        <p class="text-gray-600 mb-6 text-sm md:text-base">
          We are Online chat application for companys to share them files.
        </p>
        <div class="flex justify-center md:justify-start space-x-4">
          <a class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 text-sm md:text-base" href="/signin">Login</a>
          <button class="bg-gray-200 text-blue-600 py-2 px-4 rounded hover:bg-gray-300 text-sm md:text-base">Free Trial 30 Days</button>
        </div>
      </div>
    </section>\
    <!-- Footer -->
    <footer class="bg-blue-800 text-gray-200 py-10 mt-10">
      <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

          <!-- About Section -->
          <div>
            <h2 class="text-lg font-bold mb-4">About Us</h2>
            <p class="text-gray-400 text-sm">
              We provide an online chatting platform designed to help you connect with people and explore our services.
            </p>
          </div>

          <!-- Quick Links Section -->
          <div>
            <h2 class="text-lg font-bold mb-4">Quick Links</h2>
            <ul class="space-y-2">
              <li><a href="#" class="hover:text-blue-400">Home</a></li>
              <li><a href="#" class="hover:text-blue-400">About</a></li>
              <li><a href="#" class="hover:text-blue-400">Service</a></li>
              <li><a href="#" class="hover:text-blue-400">Contact Us</a></li>
              <li><a href="#" class="hover:text-blue-400">FAQ</a></li>
            </ul>
          </div>

          <!-- Contact Section -->
          <div>
            <h2 class="text-lg font-bold mb-4">Contact Us</h2>
            <p class="text-gray-400 text-sm">Email: support@chatapp.com</p>
            <p class="text-gray-400 text-sm">Phone: +123 456 7890</p>
            <div class="flex space-x-4 mt-4">
              <a href="#" class="text-gray-400 hover:text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M18.94 8.936l.353-2.462-2.48-.353-.354 2.463 2.481.352zm-9.41-.141l-.143 2.481 2.482.353.142-2.482-2.481-.352zm6.77 1.234c.035-.247.07-.492.104-.74H15.3c-.036.247-.07.492-.104.74h1.9zm-7.35 4.9h6.116c-.042-.252-.084-.504-.126-.757h-5.86c-.042.253-.084.505-.126.757zm8.51 0h1.477l-.355-2.485-2.481-.353-.354 2.484 1.713.353zm-7.35-6.187c-.071.243-.14.486-.208.73h5.782c-.068-.244-.137-.487-.207-.73h-5.367zm2.82-1.79c-.083.242-.165.487-.246.73h6.433c-.082-.243-.163-.487-.246-.73H12.96zm.084 10.856c0 .737.595 1.332 1.33 1.332.734 0 1.33-.595 1.33-1.332H13.08zM21.76 12c0 5.359-4.355 9.717-9.717 9.717S2.327 17.359 2.327 12 6.683 2.284 12.043 2.284c5.359 0 9.717 4.358 9.717 9.716z"></path>
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M19.615 3H4.385A1.388 1.388 0 003 4.385v15.23A1.388 1.388 0 004.385 21h15.23A1.388 1.388 0 0021 19.615V4.385A1.388 1.388 0 0019.615 3zM18 9.74a6.1 6.1 0 01-1.186.123 2.986 2.986 0 00.516-1.598 3 3 0 00-3-3 3 3 0 00-2.912 2.98 2.97 2.97 0 00.064.593 8.518 8.518 0 01-6.18-3.144A2.981 2.981 0 005.3 8.2a3 3 0 001.328.038A2.985 2.985 0 006.1 12a3 3 0 001.09.798 3.012 3.012 0 01-.67.07A2.985 2.985 0 009 15a6.028 6.028 0 01-3.745 1.288A7.945 7.945 0 007 18.706a8.1 8.1 0 004.936 1.672 8.51 8.51 0 008.512-8.512l-.01-.39A5.976 5.976 0 0021 8.785a6.07 6.07 0 01-1.638.454A3 3 0 0018 9.74z"></path>
                </svg>
              </a>
              <a href="#" class="text-gray-400 hover:text-blue-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M22.21 6.09A6.142 6.142 0 0020 4.75a4.302 4.302 0 00-2.4.09A4.3 4.3 0 0016.09 6a6.042 6.042 0 00-2.2 4.49c-.01 3.66 3.25 6.94 7.68 6.74.94-.03 1.88-.15 2.81-.34-1.65 3.35-5.64 4.96-10.06 3.83-4.42-1.14-7.74-5.15-7.64-9.58 0-.8.08-1.6.24-2.39A8.656 8.656 0 013.85 6c1.22-.75 2.53-1.29 3.91-1.56A11.998 11.998 0 018.7 4.91c.24.39.49.77.75 1.16.26-.07.54-.14.83-.19-1.13 1.2-1.62 2.75-1.49 4.27a11.514 11.514 0 00-.69-4.25 10.003 10.003 0 019.79-.99c.07.23.13.47.2.7a8.258 8.258 0 001.68 3.54c1.21-1.03 2.53-2.01 4.09-2.86z"></path>
                </svg>
              </a>
            </div>
          </div>

        </div>

        <!-- Footer Bottom -->
        <div class="text-center text-gray-500 text-sm mt-10">
          © 2024 ChatApp. All rights reserved.
        </div>
      </div>
    </footer>

  </div>
  <script src="/js/colorchange.js"></script>
</body>

</html>
