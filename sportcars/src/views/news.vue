<template>
    <div>
      <!-- Header Component -->
      <app-header />
  
      <!-- News Hero Section -->
      <div class="news-hero bg-black text-white py-20 text-center">
        <div class="container mx-auto px-4">
          <h1 
            class="text-3xl md:text-5xl font-bold mb-6"
            data-aos="fade-up"
          >
            Ferrari News
          </h1>
          <p 
            class="max-w-3xl mx-auto text-base md:text-xl text-gray-300"
            data-aos="fade-up" 
            data-aos-delay="200"
          >
            Stay updated with the latest from the world of Ferrari
          </p>
        </div>
      </div>
  
      <!-- Featured News Section -->
      <section 
        class="featured-news bg-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto">
          <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center text-red-600">
            Featured Stories
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div 
              v-for="(article, index) in featuredNews" 
              :key="index"
              class="news-card bg-white shadow-lg rounded-lg overflow-hidden"
              :data-aos="'fade-up'"
              :data-aos-delay="index * 200"
            >
              <img 
                :src="article.imageUrl" 
                :alt="article.title"
                class="w-full h-48 object-cover"
              />
              <div class="p-6">
                <div class="flex items-center mb-2">
                  <span class="text-red-500 mr-2">{{ article.date }}</span>
                  <span class="text-gray-500">{{ article.category }}</span>
                </div>
                <h3 class="text-xl font-bold mb-4">{{ article.title }}</h3>
                <p class="text-gray-700 mb-4">{{ article.excerpt }}</p>
                <a 
                  href="#" 
                  class="inline-block text-red-600 hover:text-red-800 transition"
                >
                  Read More &rarr;
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Latest News Section -->
      <section 
        class="latest-news bg-gray-100 py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto">
          <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center text-red-600">
            Latest News
          </h2>
          <div class="max-w-4xl mx-auto space-y-6">
            <div 
              v-for="(article, index) in latestNews" 
              :key="index"
              class="bg-white rounded-lg shadow-md p-6 flex flex-col md:flex-row items-start"
              :data-aos="'fade-up'"
              :data-aos-delay="index * 200"
            >
              <div class="md:w-1/3 mb-4 md:mb-0 md:mr-6">
                <img 
                  :src="article.imageUrl" 
                  :alt="article.title"
                  class="w-full h-40 object-cover rounded-lg"
                />
              </div>
              <div class="md:w-2/3">
                <div class="flex items-center mb-2">
                  <span class="text-red-500 mr-2">{{ article.date }}</span>
                  <span class="text-gray-500">{{ article.category }}</span>
                </div>
                <h3 class="text-xl font-bold mb-4">{{ article.title }}</h3>
                <p class="text-gray-700 mb-4">{{ article.excerpt }}</p>
                <a 
                  href="#" 
                  class="inline-block text-red-600 hover:text-red-800 transition"
                >
                  Continue Reading &rarr;
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Newsletter Signup -->
      <section 
        class="newsletter bg-black text-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto max-w-2xl text-center">
          <h2 class="text-2xl md:text-3xl font-bold mb-6">
            Stay Connected with Ferrari
          </h2>
          <p class="text-gray-300 mb-8">
            Subscribe to our newsletter and never miss an update from the world of Ferrari.
          </p>
          <form @submit.prevent="subscribeNewsletter" class="flex flex-col md:flex-row justify-center">
            <input 
              type="email" 
              v-model="email"
              required
              placeholder="Enter your email address"
              class="w-full md:w-2/3 px-4 py-3 mb-4 md:mb-0 md:mr-4 rounded-lg text-black"
            />
            <button 
              type="submit" 
              class="w-full md:w-auto px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
            >
              Subscribe
            </button>
          </form>
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
    name: 'NewsPage',
    components: {
      AppHeader,
      AppFooter
    },
    data() {
      return {
        email: '',
        featuredNews: [
          {
            title: 'Ferrari Unveils Next-Generation Hybrid Supercar',
            date: 'June 15, 2024',
            category: 'Technology',
            excerpt: 'A breakthrough in performance and sustainability, showcasing Ferrari\'s commitment to innovation.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Hybrid+Supercar'
          },
          {
            title: 'Ferrari Wins World Championship',
            date: 'May 22, 2024',
            category: 'Racing',
            excerpt: 'Dominant performance secures another prestigious title for the legendary racing team.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Racing+Victory'
          },
          {
            title: 'Inside the Design of the New Ferrari Roma',
            date: 'April 10, 2024',
            category: 'Design',
            excerpt: 'An exclusive look at the design philosophy behind our latest luxury sports car.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Roma+Design'
          }
        ],
        latestNews: [
          {
            title: 'Sustainable Future: Ferrari\'s Green Initiative',
            date: 'July 5, 2024',
            category: 'Sustainability',
            excerpt: 'Exploring our commitment to reducing environmental impact without compromising performance.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Sustainability'
          },
          {
            title: 'Behind the Scenes: Ferrari Factory Tour',
            date: 'June 28, 2024',
            category: 'Manufacturing',
            excerpt: 'A rare glimpse into the precision and craftsmanship of our production process.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Factory'
          },
          {
            title: 'Collector\'s Edition: Rare Ferrari Models',
            date: 'June 20, 2024',
            category: 'Collectibles',
            excerpt: 'Discover the most sought-after and valuable Ferrari models in automotive history.',
            imageUrl: 'https://via.placeholder.com/600x400.png?text=Ferrari+Collectibles'
          }
        ]
      }
    },
    methods: {
      subscribeNewsletter() {
        // Placeholder for newsletter subscription logic
        alert('Thank you for subscribing to Ferrari News!');
        this.email = '';
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
  </style>