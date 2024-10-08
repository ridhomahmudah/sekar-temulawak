<script>
import axios from "axios";

export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      showPassword: false,
      error: null,
    };
  },
  methods: {
    register() {
      axios.defaults.withCredentials = true;
      const registerData = {
        name: this.name,
        email: this.email,
        password: this.password,
      };

      axios
        .post("/register", registerData)
        .then((response) => {
          console.log("Register berhasil", response.data);
        })
        .catch((error) => {
          console.error(
            "Register gagal",
            error.response?.data || error.message
          );
          this.error = "Registrasi gagal. Silakan coba lagi.";
        });
    },

    registerWithGoogle() {
      axios.defaults.withCredentials = true;
      axios
        .get("http://localhost:8000/auth/google/redirect")
        .then((response) => {
          if (response.data && response.data.redirect_url) {
            window.location.href = response.data.redirect_url;
          } else {
            throw new Error("Respons tidak valid dari server");
          }
        })
        .catch((error) => {
          console.error(
            "Google login gagal",
            error.response?.data || error.message
          );
          this.error = "Gagal memulai login Google. Silakan coba lagi.";
        });
    },

    togglePassword() {
      this.showPassword = !this.showPassword;
      const passwordField = document.getElementById("password");
      passwordField.type = this.showPassword ? "text" : "password";
    },
  },
};
</script>

<template>
  <div id="containerRegister" class="flex">
    <!-- Sisi Kiri -->
    <div
      class="w-1/2 relative bg-cover bg-center"
      style="background-image: url('/public/img/gambar-login-regis.jpg')"
    >
      <div class="absolute inset-0 bg-black opacity-20"></div>
      <div
        class="relative flex flex-col items-center justify-center h-full text-white p-8"
      >
        <h1 class="text-4xl mb-4 font-bold">Silakan Masuk</h1>
        <p class="text-lg mb-8 text-center">
          Silahkan lakukan pendaftaran jika anda belum mempunyai akun dan
          silahkan klik tombol masuk jika anda sudah mempunyai akun
        </p>
        <button
          class="border-2 border-white rounded-full px-8 py-2 text-lg font-bold hover:bg-white hover:text-black transition"
        >
          MASUK
        </button>
      </div>
    </div>

    <!-- Sisi Kanan -->
    <div
      class="w-1/2 flex flex-col items-center my-auto bg-white"
    >
      <h2 class="text-4xl font-bold text-green-900 mb-8">Pendaftaran</h2>
      <form class="w-full max-w-md space-y-4" @submit.prevent="register">
        <!-- Input Username -->
        <div>
          <label
            for="username"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Nama</label
          >
          <input
            type="text"
            id="username"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
            placeholder="Masukkan Nama"
            required
          />
        </div>

        <!-- Input Email -->
        <div>
          <label
            for="email"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Email</label
          >
          <input
            type="email"
            id="email"
            v-model="email"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
            placeholder="Masukkan Email"
            required
          />
        </div>

        <!-- Input Password -->
        <div>
          <label
            for="password"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Password</label
          >
          <input
            type="password"
            id="password"
            v-model="password"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
            placeholder="Masukkan Password"
            required
          />
        </div>

        <!-- Konfirmasi Password -->
        <div>
          <label
            for="password"
            class="block mb-2 text-sm font-medium text-gray-900"
            >Password</label
          >
          <input
            type="password"
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
              @click="togglePassword"
              type="checkbox"
              class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
            />
            <label
              for="show-password"
              class="ml-2 text-sm font-medium text-gray-900"
              >Tampilkan Password</label
            >
          </div>
          <a href="#" class="text-sm text-green-700 hover:underline"
            >Lupa Password?</a
          >
        </div>

        <!-- Tombol Daftar -->
        <button
          type="submit"
          class="w-full py-2 bg-green-700 text-white font-semibold rounded-lg hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500"
        >
          Daftar
        </button>

        <!-- Garis Pemisah atau -->
        <div class="flex items-center my-4">
          <div class="flex-grow bg-gray-300 h-px"></div>
          <span class="px-4 text-sm text-gray-600">Atau</span>
          <div class="flex-grow bg-gray-300 h-px"></div>
        </div>

        <!-- Tombol Daftar dengan Google -->
        <button
          type="button"
          @click="registerWithGoogle"
          class="w-full py-2 bg-white border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300"
        >
          <img
            src="/public/img/google-logo.svg"
            class="w-6 h-6 mr-2"
            alt="Google"
          />
          Daftar dengan Google
        </button>
      </form>
    </div>
  </div>
</template>

<style scoped>
#containerRegister {
  height: 100vh;
}
</style>
