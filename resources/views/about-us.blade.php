<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us</title>
         <!-- Styles / Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
         <script defer type="text/javascript">
             const ROOT = "{{ URL::to('/') }}"
         </script>
         <script defer src="js/functions.js"></script>
         <script defer src="js/script.js"></script>
    </head>
    <body class="transition-colors duration-500 bg-fill" id="body">

        <!-- Navbar -->
        <x-nav></x-nav>

        <!-- About Page Header -->
        <header class="bg-blue-800 py-10 text-center text-white">
            <h1 class="text-4xl font-bold">About Us</h1>
            <p class="mt-2 text-gray-300">Get to know more about our company and our mission.</p>
        </header>

        <!-- Introduction Section -->
        <section class="mx-auto max-w-6xl px-6 py-12 text-header md:py-20">
            <h2 class="mb-6 text-center text-3xl font-semibold">Who We Are</h2>
            <p class="mx-auto max-w-3xl text-center text-lg">
                We are a passionate team dedicated to connecting people through innovative online chatting solutions.
                Our platform enables seamless communication for individuals and businesses alike, fostering meaningful
                relationships.
            </p>
        </section>

        <!-- Our Mission Section -->
        <section class="bg-white py-12 md:py-20">
            <div class="mx-auto max-w-6xl px-6 text-gray-700 md:px-8">
                <h2 class="mb-6 text-center text-3xl font-semibold">Our Mission</h2>
                <p class="mx-auto max-w-3xl text-center text-lg">
                    Our mission is to make communication effortless and accessible for everyone, enabling users to
                    connect, share, and grow together through our platform. We strive to innovate continuously to
                    enhance user experience and provide reliable services.
                </p>
            </div>
        </section>

        <!-- Team Section -->
        <section class="mx-auto max-w-6xl px-6 py-12 text-header md:py-20">
            <h2 class="mb-6 text-center text-3xl font-semibold">Meet Our Team</h2>
            <div class="grid grid-cols-1 gap-8 text-center md:grid-cols-3">
                <!-- Team Member 1 -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <img src="https://via.placeholder.com/100" alt="Team Member"
                        class="mx-auto mb-4 h-24 w-24 rounded-full object-cover">
                    <h3 class="text-xl font-semibold">John Doe</h3>
                    <p class="text-blue-600">CEO & Founder</p>
                    <p class="mt-2 text-gray-600">John is the visionary behind our platform, leading the team with
                        passion and expertise.</p>
                </div>
                <!-- Team Member 2 -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <img src="https://via.placeholder.com/100" alt="Team Member"
                        class="mx-auto mb-4 h-24 w-24 rounded-full object-cover">
                    <h3 class="text-xl font-semibold">Jane Smith</h3>
                    <p class="text-blue-600">CTO</p>
                    <p class="mt-2 text-gray-600">Jane is the tech genius, driving our innovative approach to online
                        communication.</p>
                </div>
                <!-- Team Member 3 -->
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <img src="https://via.placeholder.com/100" alt="Team Member"
                        class="mx-auto mb-4 h-24 w-24 rounded-full object-cover">
                    <h3 class="text-xl font-semibold">Mike Johnson</h3>
                    <p class="text-blue-600">Head of Marketing</p>
                    <p class="mt-2 text-gray-600">Mike makes sure our platform reaches people who can benefit from our
                        services.</p>
                </div>
            </div>
        </section>

        <!-- Company Values Section -->
        <section class="bg-blue-100 py-12 md:py-20">
            <div class="mx-auto max-w-6xl px-6 text-gray-700 md:px-8">
                <h2 class="mb-6 text-center text-3xl font-semibold">Our Values</h2>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <!-- Value 1 -->
                    <div class="rounded-lg bg-white p-6 shadow-md">
                        <h3 class="text-xl font-semibold text-blue-600">Innovation</h3>
                        <p class="mt-2 text-gray-600">We believe in pushing boundaries to create solutions that enhance
                            communication.</p>
                    </div>
                    <!-- Value 2 -->
                    <div class="rounded-lg bg-white p-6 shadow-md">
                        <h3 class="text-xl font-semibold text-blue-600">Integrity</h3>
                        <p class="mt-2 text-gray-600">Our commitment to transparency and trust is at the core of
                            everything we do.</p>
                    </div>
                    <!-- Value 3 -->
                    <div class="rounded-lg bg-white p-6 shadow-md">
                        <h3 class="text-xl font-semibold text-blue-600">Customer Focus</h3>
                        <p class="mt-2 text-gray-600">
                            We strive to meet our users' needs and provide the best experience possible.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-blue-800 py-6 text-center text-gray-200">
            <p>© 2024 ChatApp. All rights reserved.</p>
        </footer>
    </body>
</html>
