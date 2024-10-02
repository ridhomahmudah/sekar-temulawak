<script>
import { createWebHistory, createRouter } from "vue-router";
import HomePage from "../pages/LandingPage.vue";
import Login from "../pages/Login.vue";
import Register from "../pages/Register.vue";
const routes = [
  { path: "/", component: HomePage },
  { path: "/login", component: Login },
  { path: "/register", component: Register },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
</script>
