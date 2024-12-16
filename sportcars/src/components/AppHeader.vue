<template>
    <header class="navbar flex justify-between items-center p-4 bg-black shadow-md">
      <div class="nav-left flex space-x-4">
        <router-link to="/" class="text-white hover:underline">HOME</router-link>
        <router-link to="/race" class="text-white hover:underline">RACING</router-link>
        <router-link to="/cars" class="text-white hover:underline">SPORT CARS</router-link>
      </div>
      <div class="logo">
        <img src="/assets/image 18.png" alt="image-header" class="w-7" />
      </div>
      <div class="nav-right flex space-x-4">
        <li><router-link to="/about" class="text-white hover:underline">ABOUT US</router-link></li>
        <a href="#" class="text-white hover:underline">SEARCH</a>
      </div>
    </header>
  </template>
  
  <script>
  export default {
    name: 'AppHeader'
  }
  </script>