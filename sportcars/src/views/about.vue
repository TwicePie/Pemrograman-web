<template>
    <div>
      <!-- Header Component -->
      <app-header />
  
      <!-- Hero Section -->
      <div class="hero bg-black text-white py-20 text-center">
        <div class="container mx-auto px-4">
          <h1 
            class="text-3xl md:text-5xl font-bold mb-6"
            data-aos="fade-up"
          >
            About Ferrari
          </h1>
          <p 
            class="max-w-3xl mx-auto text-base md:text-xl text-gray-300"
            data-aos="fade-up" 
            data-aos-delay="200"
          >
            A legacy of passion, innovation, and unparalleled automotive excellence that has defined the pinnacle of performance for decades.
          </p>
        </div>
      </div>
  
      <!-- Company History Section -->
      <section 
        class="history bg-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto flex flex-col md:flex-row items-center">
          <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-red-600">
              Our Extraordinary Journey
            </h2>
            <p class="text-gray-700 mb-4 leading-relaxed">
              Founded in 1939 by Enzo Ferrari, our company began not as a manufacturer of road cars, but as a sponsor of racing drivers. In 1947, the first Ferrari-badged car was completed, marking the beginning of an automotive legend that would change the world of motorsport forever.
            </p>
            <p class="text-gray-700 leading-relaxed">
              From the legendary Scuderia Ferrari racing team to our most exclusive road cars, we have consistently pushed the boundaries of automotive engineering, design, and performance.
            </p>
          </div>
          <div class="md:w-1/2">
            <img 
              src="https://via.placeholder.com/600x400.png?text=Ferrari+History" 
              alt="Ferrari History" 
              class="rounded-lg shadow-lg w-full object-cover"
            />
          </div>
        </div>
      </section>
  
      <!-- Our Values Section -->
      <section 
        class="values bg-gray-100 py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto text-center">
          <h2 class="text-2xl md:text-3xl font-bold mb-12 text-red-600">
            Our Core Values
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div 
              class="value-card bg-white p-8 rounded-lg shadow-md"
              v-for="(value, index) in values" 
              :key="index"
              :data-aos="'fade-up'"
              :data-aos-delay="index * 200"
            >
              <div class="text-4xl text-red-600 mb-4">
                <i :class="value.icon"></i>
              </div>
              <h3 class="text-xl font-bold mb-4">{{ value.title }}</h3>
              <p class="text-gray-700">{{ value.description }}</p>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Innovation Section -->
      <section 
        class="innovation bg-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto">
          <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-8 md:mb-0 md:pr-12">
              <h2 class="text-2xl md:text-3xl font-bold mb-6 text-red-600">
                Continuous Innovation
              </h2>
              <p class="text-gray-700 mb-4 leading-relaxed">
                At Ferrari, innovation is not just a process—it's our passion. From groundbreaking aerodynamic designs to cutting-edge hybrid technology, we continually redefine what's possible in automotive engineering.
              </p>
              <p class="text-gray-700 leading-relaxed">
                Our commitment to research and development ensures that each Ferrari is a masterpiece of performance, technology, and Italian craftsmanship.
              </p>
            </div>
            <div class="md:w-1/2">
              <img 
                src="https://via.placeholder.com/600x400.png?text=Ferrari+Innovation" 
                alt="Ferrari Innovation" 
                class="rounded-lg shadow-lg w-full object-cover"
              />
            </div>
          </div>
        </div>
      </section>
  
      <!-- Footer Component -->
      <app-footer />
    </div>
  </template>
  
  <script>
  import AppHeader from '@/components/AppHeader.vue'
  import AppFooter from '@/components/AppFooter.vue'
  import AOS from 'aos'
  import 'aos/dist/aos.css'
  
  export default {
    name: 'AboutUs',
    components: {
      AppHeader,
      AppFooter
    },
    data() {
      return {
        values: [
          {
            icon: 'fas fa-trophy',
            title: 'Performance',
            description: 'Relentless pursuit of speed, precision, and automotive excellence.'
          },
          {
            icon: 'fas fa-paint-brush',
            title: 'Design',
            description: 'Crafting automotive art that combines beauty with unparalleled function.'
          },
          {
            icon: 'fas fa-heart',
            title: 'Passion',
            description: 'Driven by an unwavering love for racing, engineering, and innovation.'
          }
        ]
      }
    },
    mounted() {
      AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-in-out'
      });
    }
  }
  </script>
  
  <style>
  @import 'tailwindcss/tailwind.css';
  @import 'aos/dist/aos.css';
  
  /* Optional: Font Awesome for icons (if you want to use them) */
  @import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css';
  </style>