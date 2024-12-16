<template>
    <footer class="bg-black text-white p-10 text-center">
      <ul class="flex justify-center space-x-6 mb-4">
        <li><router-link to="/cookie" class="hover:underline">Cookie Settings</router-link></li>
        <li><router-link to="/contact" class="hover:underline">Contact Us</router-link></li>
        <li><router-link to="/community" class="hover:underline">Community</router-link></li>
        <li><router-link to="/about" class="hover:underline">About Us</router-link></li>
        <li><router-link to="/news" class="hover:underline">News</router-link></li>
      </ul>
      <p class="text-gray-400">&copy; 2024 Ferrari Co. All rights reserved</p>
    </footer>
  </template>
  
  <script>
  export default {
    name: 'AppFooter'
  }
  </script>