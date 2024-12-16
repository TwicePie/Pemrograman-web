<template>
    <div>
      <!-- Header Component -->
      <app-header />
  
      <!-- Cookie Settings Hero Section -->
      <div class="cookie-hero bg-black text-white py-16 text-center">
        <div class="container mx-auto px-4">
          <h1 
            class="text-3xl md:text-5xl font-bold mb-6"
            data-aos="fade-up"
          >
            Cookie Settings
          </h1>
          <p 
            class="max-w-3xl mx-auto text-base md:text-xl text-gray-300"
            data-aos="fade-up" 
            data-aos-delay="200"
          >
            Manage your privacy preferences and cookie settings
          </p>
        </div>
      </div>
  
      <!-- Cookie Preferences Section -->
      <section 
        class="cookie-preferences bg-white py-16 px-4"
        data-aos="fade-up"
      >
        <div class="container mx-auto max-w-4xl">
          <div class="bg-gray-100 rounded-lg p-8 shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-red-600">
              Manage Cookie Preferences
            </h2>
  
            <div class="space-y-6">
              <!-- Necessary Cookies -->
              <div class="flex items-center justify-between border-b pb-4">
                <div>
                  <h3 class="font-semibold text-lg">Necessary Cookies</h3>
                  <p class="text-gray-600 text-sm">
                    These cookies are essential for the website to function properly.
                  </p>
                </div>
                <div>
                  <input 
                    type="checkbox" 
                    id="necessary-cookies" 
                    checked 
                    disabled 
                    class="form-checkbox text-red-600"
                  />
                </div>
              </div>
  
              <!-- Preference Cookies -->
              <div class="flex items-center justify-between border-b pb-4">
                <div>
                  <h3 class="font-semibold text-lg">Preference Cookies</h3>
                  <p class="text-gray-600 text-sm">
                    Used to remember your preferences and customize your experience.
                  </p>
                </div>
                <div>
                  <input 
                    type="checkbox" 
                    id="preference-cookies" 
                    v-model="preferenceConsent"
                    class="form-checkbox text-red-600"
                  />
                </div>
              </div>
  
              <!-- Analytics Cookies -->
              <div class="flex items-center justify-between border-b pb-4">
                <div>
                  <h3 class="font-semibold text-lg">Analytics Cookies</h3>
                  <p class="text-gray-600 text-sm">
                    Help us understand how users interact with our website.
                  </p>
                </div>
                <div>
                  <input 
                    type="checkbox" 
                    id="analytics-cookies" 
                    v-model="analyticsConsent"
                    class="form-checkbox text-red-600"
                  />
                </div>
              </div>
  
              <!-- Marketing Cookies -->
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="font-semibold text-lg">Marketing Cookies</h3>
                  <p class="text-gray-600 text-sm">
                    Used to track you across websites to deliver targeted ads.
                  </p>
                </div>
                <div>
                  <input 
                    type="checkbox" 
                    id="marketing-cookies" 
                    v-model="marketingConsent"
                    class="form-checkbox text-red-600"
                  />
                </div>
              </div>
            </div>
  
            <div class="mt-8 flex justify-between items-center">
              <button 
                @click="resetToDefault"
                class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition"
              >
                Reset to Default
              </button>
              <button 
                @click="saveCookiePreferences"
                class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
              >
                Save Preferences
              </button>
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
    name: 'CookiePage',
    components: {
      AppHeader,
      AppFooter
    },
    data() {
      return {
        preferenceConsent: false,
        analyticsConsent: false,
        marketingConsent: false
      }
    },
    methods: {
      resetToDefault() {
        this.preferenceConsent = false
        this.analyticsConsent = false
        this.marketingConsent = false
        this.saveCookiePreferences()
      },
      saveCookiePreferences() {
        // Placeholder for actual cookie preference saving logic
        const cookiePreferences = {
          preference: this.preferenceConsent,
          analytics: this.analyticsConsent,
          marketing: this.marketingConsent
        }
        
        try {
          // Example: Save to localStorage
          localStorage.setItem('cookieConsent', JSON.stringify(cookiePreferences))
          alert('Cookie preferences saved successfully!')
        } catch (error) {
          console.error('Error saving cookie preferences:', error)
          alert('Failed to save cookie preferences.')
        }
      }
    },
    mounted() {
      AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-in-out'
      })
  
      // Load existing preferences from localStorage
      const savedPreferences = localStorage.getItem('cookieConsent')
      if (savedPreferences) {
        const preferences = JSON.parse(savedPreferences)
        this.preferenceConsent = preferences.preference
        this.analyticsConsent = preferences.analytics
        this.marketingConsent = preferences.marketing
      }
    }
  }
  </script>
  
  <style>
  @import 'tailwindcss/tailwind.css';
  @import 'aos/dist/aos.css';
  </style>