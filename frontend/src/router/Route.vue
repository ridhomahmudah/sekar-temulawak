<script>
import { createWebHistory, createRouter } from "vue-router";
import HomePage from "@/pages/LandingPage.vue";
import Login from "@/pages/Login.vue";
import Register from "@/pages/Register.vue";
import LoginCallback from "@/components/LoginCallback.vue";
import Keranjang from "@/pages/Keranjang.vue";
import BuatPesanan from "@/pages/BuatPesanan.vue";
import ArtikelDetail from "@/pages/ArtikelDetail.vue";
import Pembayaran from "@/pages/Pembayaran.vue";
import BayarPesanan from "@/pages/BayarPesanan.vue";

const routes = [
  { path: "/", component: HomePage, name: "home" },
  { path: "/login", component: Login, name: "login" },
  { path: "/register", component: Register, name: "register" },
  { path: "/auth/google/callback", component: LoginCallback, name: "login-callback" },
  { path: "/keranjang", component: Keranjang, name: "keranjang" },
  { path: "/pembayaran", component: Pembayaran, name: "pembayaran" },
  { path: "/bayar/pesanan/:id", component: BayarPesanan, name: "bayar-pesanan" },
  { path: "/buat/pesanan/:id", component: BuatPesanan, name: "pesanan" },
  { path: "/artikel/:id", component: ArtikelDetail, name: "artikel-detail" }, // Route untuk detail artikel
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
</script>
