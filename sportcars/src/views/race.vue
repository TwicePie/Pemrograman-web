<template>
  <div>
    <!-- Navbar -->
    <app-header />

    <!-- Main Content -->
    <main class="max-w-5xl mx-auto p-6">
      <h1 class="text-3xl mb-6" data-aos="fade-up">Manage Race Schedules</h1>

      <!-- Form for Adding or Editing Race Schedules -->
      <form 
        @submit.prevent="submitRaceSchedule" 
        class="bg-white p-6 rounded-lg shadow-md mb-8" 
        data-aos="fade-right"
      >
        <label for="event-name" class="block text-lg font-semibold mb-2">Event Name:</label>
        <input id="event-name" v-model="newRace.event_name" required
          class="w-full p-3 border border-gray-300 rounded-lg mb-4" type="text" placeholder="Enter event name" />

        <label for="location" class="block text-lg font-semibold mb-2">Location:</label>
        <input id="location" v-model="newRace.location" required
          class="w-full p-3 border border-gray-300 rounded-lg mb-4" type="text" placeholder="Enter location" />

        <label for="race-date" class="block text-lg font-semibold mb-2">Date & Time:</label>
        <input id="race-date" v-model="newRace.race_date" required
          class="w-full p-3 border border-gray-300 rounded-lg mb-4" type="datetime-local" />

        <button 
          type="submit" 
          class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition"
        >
          {{ isEditing ? "Update Schedule" : "Add Schedule" }}
        </button>
      </form>

      <!-- Schedules Container -->
      <h2 class="text-2xl mb-6" data-aos="fade-up">Upcoming Races</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div 
          v-for="schedule in races" 
          :key="schedule.id" 
          class="bg-white p-4 shadow-md rounded-lg"
          data-aos="zoom-in"
        >
          <h3 class="text-xl font-semibold mb-2">{{ schedule.event_name }}</h3>
          <p class="text-gray-700">Location: {{ schedule.location }}</p>
          <p class="text-gray-700">Date: {{ new Date(schedule.race_date).toLocaleString() }}</p>
          <div class="mt-4 flex justify-between">
            <button @click="editRace(schedule)"
              class="bg-yellow-400 text-white px-4 py-2 rounded-lg hover:bg-yellow-500">
              Edit
            </button>
            <button @click="deleteRace(schedule.id)"
              class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
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
import AOS from "aos";
import "aos/dist/aos.css";
import Api from "@/api/index.js";
import AppHeader from "@/components/AppHeader.vue";
import AppFooter from "@/components/AppFooter.vue";

export default {
  components: {
    AppHeader,
    AppFooter,
  },
  data() {
    return {
      races: [], // Data jadwal balapan
      newRace: {
        id: null, // Tambahkan ID untuk operasi update
        event_name: "",
        location: "",
        race_date: "",
      },
      isEditing: false, // Status apakah sedang dalam mode edit
    };
  },
  methods: {
    // Fetch all race schedules (GET)
    async fetchRaces() {
      try {
        const response = await Api.get("/race-schedules");
        this.races = response.data;
      } catch (error) {
        console.error("Error fetching races:", error);
      }
    },

    // Add or update race schedule (POST/PUT)
    async submitRaceSchedule() {
      try {
        if (this.isEditing) {
          // Update existing race schedule (PUT)
          await Api.put(`/race-schedules/${this.newRace.id}`, this.newRace);
          alert("Race schedule updated successfully!");
        } else {
          // Create new race schedule (POST)
          const response = await Api.post("/race-schedules", this.newRace);
          this.races.push(response.data); // Tambahkan ke list
          alert("Race schedule added successfully!");
        }

        this.resetForm();
        this.fetchRaces(); // Refresh data
      } catch (error) {
        console.error("Error submitting race schedule:", error);
      }
    },

    // Delete a race schedule (DELETE)
    async deleteRace(id) {
      try {
        if (confirm("Are you sure you want to delete this race schedule?")) {
          await Api.delete(`/race-schedules/${id}`);
          this.races = this.races.filter((race) => race.id !== id); // Hapus dari list
          alert("Race schedule deleted successfully!");
        }
      } catch (error) {
        console.error("Error deleting race schedule:", error);
      }
    },

    // Set race schedule for editing
    editRace(race) {
      this.newRace = { ...race };
      this.isEditing = true;
    },

    // Reset form
    resetForm() {
      this.newRace = { id: null, event_name: "", location: "", race_date: "" };
      this.isEditing = false;
    },
  },
  mounted() {
    this.fetchRaces(); // Ambil data saat pertama kali dimuat
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
    });
  },
};
</script>

<style>
@import "tailwindcss/tailwind.css";
@import "aos/dist/aos.css";
</style>
