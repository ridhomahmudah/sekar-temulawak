<script>
import { useAuthStore } from "@/storage/authStore"; // pastikan path sudah benar
import { computed, ref } from "vue";
import { useRouter } from 'vue-router';

export default {
  setup() {
    const router = useRouter();
    const authStore = useAuthStore();

    // Gunakan computed untuk status login
    const isLoggedIn = computed(() => authStore.isAuthenticated);
    const nama = computed(() => authStore.getUser);

    const logout = () => {
      // Hapus data pengguna dari localStorage
      window.localStorage.removeItem('tkn'); // Menghapus token
      window.localStorage.removeItem('nama'); // Menghapus nama
      window.localStorage.removeItem('lgn'); // Menghapus lgn
      window.localStorage.removeItem('user'); // Menghapus nama
      window.localStorage.removeItem('id'); // Menghapus id

      authStore.updateUser(null);
      authStore.setToken(null);

      // Redirect ke halaman login atau halaman utama
      router.push('/login'); // Ganti sesuai dengan rute yang Anda inginkan
    };

    const alertLogin = () => {
      alert('Silahkan Login Terlebih Dahulu !!');
    }

    return { isLoggedIn, nama, logout, alertLogin };
  },
};
</script>


<template>
  <nav
    class="fixed z-10 flex justify-between h-16 bg-white drop-shadow-xl w-full items-center px-36"
  >
    <img
      src="/public/img/logo-sekar.png"
      class="w-20 self-start"
      alt="Logo Sekar Temulawak"
    />
    <div class="flex gap-8">
      <RouterLink to="/">Home</RouterLink>
      <a href="/#produk">Produk</a>
      <a href="/#artikel">Artikel</a>
      <a href="/#about">Tentang Kami</a>
      <RouterLink v-if="isLoggedIn" to="/keranjang">Keranjang</RouterLink>
      <RouterLink v-if="isLoggedIn" to="/keranjang">Pembayaran</RouterLink>
      <RouterLink v-if="!isLoggedIn" to="/login" @click="alertLogin">Keranjang</RouterLink>
    </div>
    <div>
      <RouterLink
        v-if="!isLoggedIn"
        to="/login"
        class="outline outline-2 outline-primaryColor px-4 py-2 text-center mr-4 rounded-md"
      >
        Masuk
      </RouterLink>
      <RouterLink
        v-if="!isLoggedIn"
        to="/register"
        class="px-4 py-2 text-center text-white bg-primaryColor rounded-md"
      >
        Daftar
      </RouterLink>
      <span v-if="isLoggedIn">Welcome, {{ nama }}</span>
      <button v-if="isLoggedIn" @click="logout" class="ml-4 px-4 py-2 text-center text-white bg-red-600 rounded-md">
        Logout
      </button>
    </div>
  </nav>
</template>
