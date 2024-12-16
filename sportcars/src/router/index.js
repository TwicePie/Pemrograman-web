import { createRouter, createWebHistory } from 'vue-router';
import Cars from '../views/cars.vue';
import Community from '../views/community.vue';
import Index from '../views/index.vue';
import Race from '../views/race.vue';
import About from '../views/about.vue';
import Contact from '../views/contact.vue';
import News from '../views/news.vue';
import Cookie from '../views/cookie.vue';  // Tambahkan import untuk Cookie page

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Index,
  },
  {
    path: '/cars',
    name: 'Cars',
    component: Cars,
  },
  {
    path: '/community',
    name: 'Community',
    component: Community,
  },
  {
    path: '/race',
    name: 'Race',
    component: Race,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/contact',
    name: 'Contact',
    component: Contact,
  },
  {
    path: '/news',
    name: 'News',
    component: News,
  },
  {
    path: '/cookie',  // Tambahkan rute baru untuk Cookie Settings
    name: 'Cookie',
    component: Cookie,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;