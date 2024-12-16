<template>
  <div>
    <!-- Splash Screen -->
    <div 
      class="splash fixed inset-0 flex items-center justify-center bg-black z-50" 
      v-if="showSplash"
    >
      <img 
        src="/assets/image 18.png" 
        alt="splash-header" 
        class="splash-header transition-all duration-500"
        :class="{ 
          'scale-50 opacity-0': splashImageHidden, 
          'scale-50': !splashImageHidden 
        }" 
      />
    </div>

    <!-- Main Content -->
    <div 
      class="main-content opacity-0 transition-opacity duration-500" 
      :class="{ 'opacity-100': mainContentVisible }"
    >
      <!-- Navbar -->
      <app-header />

      <!-- Main Image -->
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 bg-black">
        <img 
          src="/assets/image 19.png" 
          alt="Gambar 1" 
          class="w-full object-cover rounded-lg shadow-md" 
          data-aos="fade-up"
        />
      </div>

      <!-- Recap Section -->
      <div 
        class="Recap flex flex-col md:flex-row justify-between items-center bg-white border border-gray-300 p-6 md:p-10 shadow-md rounded-lg mt-8 mx-4 sm:mx-6 lg:mx-8"
        data-aos="fade-up"
      >
        <div class="content max-w-3xl mb-6 md:mb-0 md:pr-10 text-center md:text-left">
          <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold mb-4">
            Tailor Made Ferrari Roma Spider: Refined and Elegant Techniques Bring an Innovative Car to Life
          </h2>
          <p class="text-sm sm:text-base md:text-lg text-gray-700 mb-4">
            Ferrari presents a unique version of the Roma Spider created by the Tailor Made department: the car will be on display at the Enzo Ferrari Museum in Modena as of today as part of the 'Ferrari One of a Kind' exhibition, dedicated to the exclusive world of personalisation for the Maranello-based manufacturer.
          </p>
          <a 
            href="#"
            class="read-more inline-block px-6 py-3 border border-black text-black hover:bg-black hover:text-white transition rounded-lg"
          >
            Read More
          </a>
        </div>
        <div class="image w-full md:max-w-sm">
          <img 
            src="/assets/image 21.png" 
            alt="Ferrari Roma Spider" 
            class="rounded-lg w-full shadow-lg" 
          />
        </div>
      </div>

      <!-- News Section -->
      <section class="news-section bg-white p-6 sm:p-8 lg:p-10 mt-8 mx-4 sm:mx-6 lg:mx-8 rounded-lg shadow-md">
        <h2 
          class="text-xl sm:text-2xl md:text-3xl font-semibold mb-6 md:mb-8 text-center md:text-left"
          data-aos="fade-up"
        >
          Newest Cars
        </h2>
        <div 
          class="news-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8"
        >
          <div 
            v-for="car in cars" 
            :key="car.id" 
            class="news-card relative p-4 bg-gray-50 rounded-lg shadow-md hover:shadow-lg transition"
            data-aos="fade-up"
          >
            <img 
              :src="car.image" 
              :alt="car.name" 
              class="w-full h-48 md:h-64 object-cover rounded-lg" 
            />
            <div class="news-meta mt-4 text-center">
              <span class="text-red-500 font-semibold mr-2">{{ car.days }} DAY</span>
              <span class="font-medium">{{ car.name }}</span>
            </div>
            <h3 class="news-heading text-lg md:text-xl font-semibold mt-2 text-center">
              {{ car.heading }}
            </h3>
          </div>
        </div>
        <div 
          class="view-all text-center md:text-right mt-6"
          data-aos="fade-up"
        >
          <a 
            href="#" 
            class="text-black inline-block font-medium hover:underline"
          >
            VIEW ALL &rarr;
          </a>
        </div>
      </section>

      <!-- Footer -->
      <app-footer />
    </div>
  </div>
</template>

<script>
import AppHeader from '@/components/AppHeader.vue'
import AppFooter from '@/components/AppFooter.vue'
import AOS from 'aos'
import 'aos/dist/aos.css'

export default {
  components: {
    AppHeader,
    AppFooter
  },
  data() {
    return {
      showSplash: true,
      splashImageHidden: false,
      mainContentVisible: false,
      cars: [
        {
          id: 1,
          image: "/assets/image 22.png",
          name: "ferrari f8 spider",
          days: 1,
          heading: "FERRARI FINALI MONDIALI 2025 AT MUGELLO",
        },
        {
          id: 2,
          image: "/assets/image 23.png",
          name: "ferrari 812 gts",
          days: 1,
          heading: "FERRARI FINALI MONDIALI 2025 AT MUGELLO",
        },
        {
          id: 3,
          image: "/assets/image 24.png",
          name: "ferrari f8 tributo",
          days: 1,
          heading: "FERRARI FINALI MONDIALI 2025 AT MUGELLO",
        },
      ],
    };
  },
  mounted() {
    // Splash screen animation
    setTimeout(() => {
      this.splashImageHidden = true;
      setTimeout(() => {
        this.showSplash = false;
        this.mainContentVisible = true;
        
        // Initialize AOS after splash screen
        AOS.init({
          duration: 800,
          once: true,
          easing: 'ease-in-out',
        });
      }, 600);
    }, 400);
  },
};
</script>

<style>
@import 'tailwindcss/tailwind.css';
@import 'aos/dist/aos.css';

/* Custom Styles */
.splash {
  animation: fadeIn 1s ease-in-out;
}
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
</style>