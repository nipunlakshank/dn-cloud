<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="transition-colors duration-500" id="body">

  <!-- Contact Page Header -->
  <header class="bg-blue-800 text-white text-center py-10">
    <h1 class="text-4xl font-bold">Contact Us</h1>
    <p class="mt-2 text-gray-300">We’d love to hear from you! Please fill out the form below and we’ll get in touch with you shortly.</p>
  </header>

  <!-- Contact Section -->
  <section class="max-w-6xl mx-auto px-6 py-12 md:py-20">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      
      <!-- Contact Form -->
      <div class="bg-white p-8 shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Send Us a Message</h2>
        <form action="#" method="POST">
          <div class="mb-4">
            <label for="name" class="block text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
          </div>
          <div class="mb-4">
            <label for="subject" class="block text-gray-600">Subject</label>
            <input type="text" id="subject" name="subject" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
          </div>
          <div class="mb-6">
            <label for="message" class="block text-gray-600">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required></textarea>
          </div>
          <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">Send Message</button>
        </form>
      </div>

      <!-- Contact Information -->
      <div class="flex flex-col justify-center space-y-6 text-gray-700">
        <div class="flex items-center space-x-4">
          <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12c0 5.524 4.477 10 10 10s10-4.476 10-10c0-5.523-4.477-10-10-10zm0 18a8.001 8.001 0 1 1 0-16 8.001 8.001 0 0 1 0 16zm-2-11h4v2h-4v-2zm0 4h4v6h-4v-6z"></path></svg>
          <div>
            <h3 class="font-semibold text-lg">Our Address</h3>
            <p>123 Chat Street, Chat City, CC 12345</p>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M21 8V7l-2 1-2-1v1l2 1 2-1zm-4 4V9l-2 1-2-1v3l2 1 2-1zm-4-1V8l-2 1-2-1v3l2 1 2-1zM5 18v-4H3v6h18v-6h-2v4H5zm3-2V6h4v6H8zm6-1V7h4v6h-4z"></path></svg>
          <div>
            <h3 class="font-semibold text-lg">Email Us</h3>
            <p>support@chatapp.com</p>
          </div>
        </div>
        <div class="flex items-center space-x-4">
          <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M15.563 8.27A8.021 8.021 0 0 0 12.003 4c-4.421 0-8 3.582-8 8 0 4.421 3.582 8 8 8 1.826 0 3.517-.609 4.927-1.727l1.738 1.738 1.414-1.414-1.737-1.738A7.966 7.966 0 0 0 20 12c0-2.094-.809-4.035-2.158-5.521l-1.278 1.278zm-3.558 8.443A6.005 6.005 0 0 1 6.003 12c0-3.312 2.688-6 6-6 1.62 0 3.078.639 4.22 1.782A5.976 5.976 0 0 1 18 12a6.005 6.005 0 0 1-6 6c-1.334 0-2.57-.43-3.583-1.168l1.586-1.586zM12 9c-.827 0-1.5.673-1.5 1.5S11.173 12 12 12s1.5-.673 1.5-1.5S12.827 9 12 9zm0 6c-1.104 0-2 .895-2 2 0 1.104.896 2 2 2s2-.896 2-2c0-1.105-.896-2-2-2z"></path></svg>
          <div>
            <h3 class="font-semibold text-lg">Call Us</h3>
            <p>+123 456 7890</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-800 text-gray-200 py-6 text-center">
    <p>© 2024 ChatApp. All rights reserved.</p>
  </footer>

  <script src="/js/colorchange.js"></script>

</body>
</html>
