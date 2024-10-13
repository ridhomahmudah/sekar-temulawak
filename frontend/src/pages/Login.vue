<template>
  <div id="containerRegister" class="flex" style="height: 100vh;">
    <!-- Sisi Kiri -->
    <div class="w-1/2 flex flex-col items-center justify-center bg-gray-100 px-8">
      <h2 class="text-4xl font-bold text-green-900 mb-8">Masuk</h2>
      <form class="w-full max-w-md space-y-4">
        <!-- Input Username -->
        <div>
          <label for="username" class="block mb-2 font-medium text-gray-900">Email</label>
          <input
            type="text"
            id="username"
            v-model="email"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
            placeholder="Masukkan Username"
            required
          />
        </div>

        <!-- Input Password -->
        <div>
          <label for="password" class="block mb-2 font-medium text-gray-900">Password</label>
          <input
            :type="showPassword ? 'text' : 'password'"
            id="password"
            v-model="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
            placeholder="Masukkan Password"
            required
          />
        </div>

        <!-- Checkbox Tampilkan Password & Lupa Password -->
        <div class="flex justify-between items-center">
          <div class="flex items-center">
            <input
              id="show-password"
              type="checkbox"
              class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
              @click="togglePassword"
            />
            <label for="show-password" class="ml-2 font-medium text-gray-900">Tampilkan Password</label>
          </div>
          <a href="#" class="text-green-700 hover:underline">Lupa Password?</a>
        </div>

        <!-- Tombol Masuk -->
        <button @click.prevent="login" type="submit" class="w-full py-2 bg-green-700 text-white font-semibold rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
          Masuk
        </button>

        <!-- Garis Pemisah atau -->
        <div class="flex items-center my-4">
          <div class="flex-grow bg-gray-300 h-px"></div>
          <span class="px-4 text-sm text-gray-600">Atau</span>
          <div class="flex-grow bg-gray-300 h-px"></div>
        </div>

        <!-- Tombol Masuk dengan Google -->
        <button @click.prevent="loginWithGoogle" class="w-full py-2 bg-white border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300">
          <img src="/public/img/google-logo.svg" class="w-6 h-6 mr-2" alt="Google" />
          Masuk dengan Google
        </button>
      </form>
    </div>

    <!-- Sisi Kanan -->
    <div class="w-1/2 relative bg-cover bg-center" style="background-image: url('/public/img/gambar-login-regis.jpg')">
      <div class="absolute inset-0 bg-black opacity-20"></div>
      <div class="relative flex flex-col items-center justify-center h-full text-white p-8">
        <h1 class="text-4xl mb-4 font-bold">Silakan Masuk</h1>
        <p class="mb-8 text-center w-[70%]">
          Silakan masukkan email dan password Anda. Jika Anda menggunakan akun Google, klik "Masuk dengan Google".
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "@/storage/authStore";
import axios from "axios";

export default {
  data() {
    return {
      email: "",
      password: "",
      showPassword: false,
    };
  },
  methods: {
    login(){
      const data = { email: this.email, password: this.password };
      axios.post("http://localhost:8000/login", data, { withCredentials: true })
        .then((response) => {
          // Simpan token dan nama pengguna ke localStorage
          localStorage.setItem('nama', response.data.Nama);
          localStorage.setItem('tkn', response.data.token);
          localStorage.setItem('id', response.data.id);

          const authStore = useAuthStore();
          authStore.updateId(response.data.id);
          authStore.setToken(response.data.token);
          authStore.updateUser(response.data.Nama);

          // Redirect ke dashboard
          this.$router.push('/'); // Ganti dengan route dashboard yang sesuai
        })
        .catch((error) => {
          alert(`Gagal terhubung ke server\n${error.response.data.message}`);
          console.error("Login failed", error.response.data.message);
        });
    },

    loginWithGoogle() { 
      axios
        .get("http://localhost:8000/auth/google/redirect")
        .then((response) => {
          const redirectUrl = response.data.redirect_url;
          window.location.href = redirectUrl;
        })
        .catch((error) => {
          alert(`Gagal terhubung ke server\n${error}`);
          console.error("Google login failed", error);
        });
    },

    togglePassword() {
      this.showPassword = !this.showPassword;
    },
  },
};
</script>
