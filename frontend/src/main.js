// import './css/output.css'

import { createApp } from 'vue'
import App from './App.vue'
import { register } from 'swiper/element/bundle';
import router from './router/Route.vue'
import {pinia} from './storage/createPinia';


const app = createApp(App);
app.use(pinia); // Ensure Pinia is used first
app.use(router);
app.mount('#app');
register();

