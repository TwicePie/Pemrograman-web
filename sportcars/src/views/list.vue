<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <app-header />

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto p-6">
      <h1 class="text-3xl font-bold mb-6" data-aos="fade-down">Sport Cars Collection</h1>
      <div id="car-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div
          v-for="car in cars"
          :key="car.id"
          class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden"
          data-aos="fade-up">
          <img :src="car.image_url" :alt="car.name" class="w-full h-64 object-cover">
          <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ car.name }}</h2>
            <p class="text-gray-700">Brand: {{ car.brand }}</p>
            <p class="text-gray-700">Price: ${{ car.price.toLocaleString() }}</p>
          </div>
        </div>
        <p v-if="cars.length === 0" class="text-gray-600 text-center" data-aos="fade-up">No cars found!</p>
      </div>
    </main>

    <!-- Footer -->
    <app-footer />
  </div>
</template>

<script>
import AppHeader from '@/components/AppHeader.vue'
import AppFooter from '@/components/AppFooter.vue'
import Api from "@/api/index.js"
import AOS from "aos";
import "aos/dist/aos.css";

export default {
  name: "CarsList",
  components: {
    AppHeader,
    AppFooter
  },
  data() {
    return {
      cars: [],
    };
  },
  mounted() {
    this.fetchCars();
    AOS.init({
      duration: 1000, // Animation duration in milliseconds
      easing: "ease-in-out", // Animation easing
      once: true, // Animation happens only once when the element is scrolled into view
    });
  },
  methods: {
    async fetchCars() {
      try {
        const response = await Api.get("/sports-cars");
        this.cars = response.data;
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    }
  }
};
</script>

<style>
@import 'https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap';
@import 'aos/dist/aos.css';
body {
  font-family: 'Bebas Neue', Arial, sans-serif;
}
</style>
