<template>
  <div>
    <!-- Navbar -->
    <app-header />

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto p-6" data-aos="fade-up">
      <h1 class="text-3xl font-bold text-center mb-10">Create Your Review</h1>

      <!-- Form for Adding or Editing Reviews -->
      <form 
        @submit.prevent="submitReview" 
        class="bg-white p-8 rounded-xl shadow-lg border border-gray-200 mb-12"
        data-aos="zoom-in"
      >
        <label for="car-name" class="block text-lg font-semibold text-gray-700 mb-2">Car Name:</label>
        <select 
          id="car-name" 
          v-model="newReview.carName" 
          required
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 mb-6"
        >
          <option value="" disabled>Select a car</option>
          <option v-for="car in cars" :key="car" :value="car">{{ car }}</option>
        </select>

        <label for="review" class="block text-lg font-semibold text-gray-700 mb-2">Your Review:</label>
        <textarea 
          id="review" 
          v-model="newReview.review" 
          placeholder="Write your review here" 
          required
          class="w-full p-3 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 mb-6"
        ></textarea>

        <button 
          type="submit" 
          class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition"
        >
          {{ isEditing ? "Update Review" : "Submit Review" }}
        </button>
      </form>

      <!-- Reviews Container -->
      <h2 class="text-2xl font-bold text-center mb-6">Community Reviews</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" data-aos="fade-right">
        <div 
          v-for="review in reviews" 
          :key="review.id" 
          class="bg-white p-6 rounded-xl shadow-lg border border-gray-200"
          data-aos="flip-left"
        >
          <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ review.carName }}</h3>
          <p class="text-gray-600 mb-4">{{ review.review }}</p>
          <div class="flex justify-between items-center">
            <button 
              @click="editReview(review)"
              class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition"
            >
              Edit
            </button>
            <button 
              @click="deleteReview(review.id)"
              class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition"
            >
              Delete
            </button>
          </div>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <app-footer />
  </div>
</template>

<script>
import AOS from 'aos';
import 'aos/dist/aos.css';
import Api from "@/api/index.js";
import AppHeader from '@/components/AppHeader.vue'
import AppFooter from '@/components/AppFooter.vue'

export default {
  components: {
    AppHeader,
    AppFooter
  },
  data() {
    return {
      reviews: [], // Data review
      cars: [], // Data mobil untuk dropdown
      newReview: {
        id: null, // Tambahkan ID untuk operasi update
        carName: "",
        review: "",
      },
      isEditing: false, // Status apakah sedang dalam mode edit
    };
  },
  methods: {
    // Fetch all car names (GET)
    async fetchCars() {
      try {
        const response = await Api.get("/sports-cars");
        this.cars = response.data.map((car) => car.name); // Ambil hanya nama mobil
      } catch (error) {
        console.error("Error fetching cars:", error);
      }
    },

    // Fetch all reviews (GET)
    async fetchReviews() {
      try {
        const response = await Api.get("/review");
        this.reviews = response.data.map((review) => ({
          ...review,
          carName: review.car_name, // Map car_name to carName
        }));
      } catch (error) {
        console.error("Error fetching reviews:", error);
      }
    },

    // Add or update review (POST/PUT)
    async submitReview() {
      try {
        if (this.isEditing) {
          // Update existing review (PUT)
          await Api.put(`/review/${this.newReview.id}`, {
            car_name: this.newReview.carName,
            review: this.newReview.review,
          });
          alert("Review updated successfully!");
        } else {
          // Create new review (POST)
          const response = await Api.post("/review", {
            car_name: this.newReview.carName,
            review: this.newReview.review,
          });
          this.reviews.push(response.data); // Tambahkan ke list
          alert("Review added successfully!");
        }

        this.resetForm();
        this.fetchReviews(); // Refresh data
      } catch (error) {
        console.error("Error submitting review:", error);
      }
    },

    // Delete a review (DELETE)
    async deleteReview(id) {
      try {
        await Api.delete(`/review/${id}`);
        this.reviews = this.reviews.filter((review) => review.id !== id); // Hapus dari list
        alert("Review deleted successfully!");
      } catch (error) {
        console.error("Error deleting review:", error);
      }
    },

    // Set review for editing
    editReview(review) {
      this.newReview = { ...review };
      this.isEditing = true;
    },

    // Reset form
    resetForm() {
      this.newReview = { id: null, carName: "", review: "" };
      this.isEditing = false;
    },
  },
  mounted() {
    AOS.init();
    this.fetchReviews(); // Ambil data saat pertama kali dimuat
    this.fetchCars(); // Ambil data mobil
  },
};
</script>

<style>
@import "tailwindcss/tailwind.css";
</style>
