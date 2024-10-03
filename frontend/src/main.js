// import './css/output.css'

import { createApp } from 'vue'
import App from './App.vue'
import { register } from 'swiper/element/bundle';
import router from './router/Route.vue'
import axios from 'axios';

createApp(App).use(router).mount('#app');
register();

