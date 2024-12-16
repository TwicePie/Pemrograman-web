<template>
  <div class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <app-header />

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-6">
      <!-- Display Existing Cars -->
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Existing Cars</h2>

      <!-- Scrollable Car List Container -->
      <div class="bg-white rounded-lg shadow-md h-[550px] overflow-y-auto">
        <div v-if="paginatedCars.length === 0" class="text-gray-500 p-4 text-center">No cars available</div>

        <!-- Scrollable Car List -->
        <div v-else>
          <div v-for="(car, index) in paginatedCars" :key="car.id"
            class="p-4 border-b last:border-b-0 hover:bg-gray-50 transition-colors">
            <div class="flex justify-between items-center">
              <div>
                <h3 class="text-xl font-semibold text-gray-800">{{ car.name }}</h3>
                <p class="text-gray-600">Stock: {{ car.stock }}</p>
                <p class="text-gray-600">Price: ${{ car.price.toLocaleString() }}</p>
              </div>
              <div class="space-x-4">
                <button @click="editCar(car, 'stock')" class="bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600">
                  Edit Stock
                </button>
                <button @click="editCar(car, 'price')" class="bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600">
                  Edit Price
                </button>
                <button @click="deleteCar(car.id)" class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600">
                  Delete
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Pagination Controls -->
      <div class="mt-4 flex justify-between items-center">
        <button @click="prevPage" :disabled="currentPage === 1"
          class="px-4 py-2 bg-blue-500 text-white rounded disabled:bg-gray-300">
          Previous
        </button>
        <span class="text-gray-700">
          Page {{ currentPage }} of {{ totalPages }}
        </span>
        <button @click="nextPage" :disabled="currentPage === totalPages"
          class="px-4 py-2 bg-blue-500 text-white rounded disabled:bg-gray-300">
          Next
        </button>
      </div>

      <!-- Form to Add a New Car -->
      <h1 class="text-3xl font-bold text-gray-800 mb-6 mt-8">Add New Sport Car</h1>
      <form @submit.prevent="addCar" class="bg-white p-6 rounded-lg shadow-md max-w-md mx-auto grid grid-cols-2 gap-4">
        <div class="col-span-2">
          <label for="name" class="block text-gray-700 font-medium mb-2">Car Name</label>
          <input 
            type="text" 
            id="name" 
            v-model="newCar.name" 
            class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300 transition-all" 
            placeholder="Enter car name" 
            required 
          />
        </div>

        <div>
          <label for="brand" class="block text-gray-700 font-medium mb-2">Brand</label>
          <input 
            type="text" 
            id="brand" 
            v-model="newCar.brand" 
            class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300 transition-all" 
            placeholder="Enter brand" 
            required 
          />
        </div>

        <div>
          <label for="price" class="block text-gray-700 font-medium mb-2">Price ($)</label>
          <input 
            type="number" 
            id="price" 
            v-model="newCar.price" 
            class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300 transition-all" 
            placeholder="Enter price" 
            required 
          />
        </div>

        <div>
          <label for="stock" class="block text-gray-700 font-medium mb-2">Stock</label>
          <input 
            type="number" 
            id="stock" 
            v-model="newCar.stock" 
            class="w-full border border-gray-300 rounded p-2 focus:ring-2 focus:ring-blue-300 transition-all" 
            placeholder="Enter quantity" 
            required 
          />
        </div>

        <div class="col-span-2">
          <label for="image" class="block text-gray-700 font-medium mb-2">Car Image</label>
          <input 
            type="file" 
            id="image" 
            @change="handleImageUpload" 
            class="w-full border border-gray-300 rounded p-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all" 
            accept="image/*" 
            required 
          />
        </div>

        <div class="col-span-2">
          <button 
            type="submit" 
            class="w-full bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-600 transition-all duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-101 shadow-md hover:shadow-lg"
          >
            Add Car
          </button>
        </div>
      </form>
    </main>

    <!-- Footer -->
    <app-footer />
  </div>
</template>

<script>
import Api from "@/api/index.js";
import AppHeader from '@/components/AppHeader.vue';
import AppFooter from '@/components/AppFooter.vue';

export default {
  name: "AddCar",
  components: {
    AppHeader,
    AppFooter
  },
  data() {
    return {
      newCar: {
        name: "",
        brand: "",
        price: null,
        stock: null,
        image: null,
      },
      cars: [],  // To store the list of existing cars
      currentPage: 1,
      itemsPerPage: 5
    };
  },
  computed: {
    totalPages() {
      return Math.ceil(this.cars.length / this.itemsPerPage);
    },
    paginatedCars() {
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = start + this.itemsPerPage;
      return this.cars.slice(start, end);
    }
  },
  methods: {
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++;
      }
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage--;
      }
    },
    handleImageUpload(event) {
      this.newCar.image = event.target.files[0]; // Store the selected file in `image`
    },
    async addCar() {
      try {
        const formData = new FormData();
        formData.append("name", this.newCar.name);
        formData.append("brand", this.newCar.brand);
        formData.append("price", this.newCar.price);
        formData.append("stock", this.newCar.stock);
        formData.append("image", this.newCar.image);

        const response = await Api.post("/sports-cars", formData, {
          headers: { "Content-Type": "multipart/form-data" },
        });

        alert("Car added successfully!");
        this.resetForm();
        this.fetchCars();  // Fetch the updated list of cars
      } catch (error) {
        console.error("Error adding car:", error);
        alert("Failed to add car.");
      }
    },
    resetForm() {
      this.newCar = {
        name: "",
        brand: "",
        price: null,
        stock: null,
        image: null,
      };
      document.getElementById("image").value = null;
    },
    async fetchCars() {
      try {
        const response = await Api.get("/sports-cars");
        this.cars = response.data;  // Set the list of cars
        this.currentPage = 1;  // Reset to first page when fetching new cars
      } catch (error) {
        console.error("Error fetching cars:", error);
      }
    },
    async editCar(car, type) {
      const currentValue = type === 'stock' ? car.stock : car.price;
      const promptMessage = `Enter new ${type} for ${car.name}`;
      const newValue = prompt(promptMessage, currentValue);
      
      if (newValue !== null && !isNaN(newValue)) {
        try {
          const response = await Api.put(`/sports-cars/${car.id}`, { [type]: newValue });
          alert(`${type.charAt(0).toUpperCase() + type.slice(1)} updated successfully!`);
          this.fetchCars();  // Fetch the updated list of cars
        } catch (error) {
          console.error(`Error updating ${type}:`, error);
          alert(`Failed to update ${type}.`);
        }
      }
    },
    async deleteCar(carId) {
      if (confirm("Are you sure you want to delete this car?")) {
        try {
          await Api.delete(`/sports-cars/${carId}`);
          alert("Car deleted successfully!");
          this.fetchCars();  // Fetch the updated list of cars
        } catch (error) {
          console.error("Error deleting car:", error);
          alert("Failed to delete car.");
        }
      }
    },
  },
  mounted() {
    this.fetchCars();  // Fetch the cars when the component is mounted
  }
};
</script>

<style scoped>
/* Custom scrollbar styling */
.overflow-y-auto::-webkit-scrollbar {
  width: 8px;
}

.overflow-y-auto::-webkit-scrollbar-track {
  background: #f1f1f1;
}

.overflow-y-auto::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 4px;
}

.overflow-y-auto::-webkit-scrollbar-thumb:hover {
  background: #555;
}
</style>