<template>
    <div>
      <!-- Header Component -->
      <app-header />
  
      <!-- Contact Hero Section -->
      <div class="contact-hero bg-black text-white py-20 text-center">
        <div class="container mx-auto px-4">
          <h1 
            class="text-3xl md:text-5xl font-bold mb-6"
            data-aos="fade-up"
          >
            Contact Ferrari
          </h1>
          <p 
            class="max-w-3xl mx-auto text-base md:text-xl text-gray-300"
            data-aos="fade-up" 
            data-aos-delay="200"
          >
            Connect with us and be part of the Ferrari legacy
          </p>
        </div>
      </div>
  
      <!-- Contact Form Section -->
      <section 
        class="contact-form bg-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto max-w-2xl">
          <form @submit.prevent="submitForm" class="space-y-6">
            <div>
              <label 
                for="name" 
                class="block text-gray-700 font-bold mb-2"
              >
                Full Name
              </label>
              <input 
                type="text" 
                id="name" 
                v-model="name"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                placeholder="Enter your full name"
              />
            </div>
  
            <div>
              <label 
                for="email" 
                class="block text-gray-700 font-bold mb-2"
              >
                Email Address
              </label>
              <input 
                type="email" 
                id="email" 
                v-model="email"
                required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                placeholder="Enter your email address"
              />
            </div>
  
            <div>
              <label 
                for="phone" 
                class="block text-gray-700 font-bold mb-2"
              >
                Phone Number
              </label>
              <input 
                type="tel" 
                id="phone" 
                v-model="phone"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                placeholder="Enter your phone number (optional)"
              />
            </div>
  
            <div>
              <label 
                for="message" 
                class="block text-gray-700 font-bold mb-2"
              >
                Your Message
              </label>
              <textarea 
                id="message" 
                v-model="message"
                required
                rows="5"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                placeholder="Write your message to Ferrari"
              ></textarea>
            </div>
  
            <div>
              <button 
                type="submit" 
                class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition duration-300"
              >
                Send Message
              </button>
            </div>
          </form>
        </div>
      </section>
  
      <!-- Contact Information Section -->
      <section 
        class="contact-info bg-gray-100 py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto max-w-4xl">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            <div 
              v-for="(info, index) in contactInfo" 
              :key="index"
              class="bg-white p-6 rounded-lg shadow-md"
              :data-aos="'fade-up'"
              :data-aos-delay="index * 200"
            >
              <div class="text-4xl text-red-600 mb-4">
                <i :class="info.icon"></i>
              </div>
              <h3 class="text-xl font-bold mb-2">{{ info.title }}</h3>
              <p class="text-gray-700">{{ info.content }}</p>
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
    name: 'ContactUs',
    components: {
      AppHeader,
      AppFooter
    },
    data() {
      return {
        name: '',
        email: '',
        phone: '',
        message: '',
        contactInfo: [
          {
            icon: 'fas fa-map-marker-alt',
            title: 'Address',
            content: 'Via Abetone Inferiore, 4, 41053 Maranello MO, Italy'
          },
          {
            icon: 'fas fa-phone',
            title: 'Phone',
            content: '+39 0536 949 111'
          },
          {
            icon: 'fas fa-envelope',
            title: 'Email',
            content: 'info@ferrari.com'
          }
        ]
      }
    },
    methods: {
      submitForm() {
        // Placeholder for form submission logic
        alert('Message sent! We will get back to you soon.');
        // Reset form after submission
        this.name = '';
        this.email = '';
        this.phone = '';
        this.message = '';
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
  
  /* Optional: Font Awesome for icons */
  @import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css';
  </style>