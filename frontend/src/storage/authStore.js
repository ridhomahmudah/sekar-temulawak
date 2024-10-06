// src/storage/authStore.js
import { useLocalStorage } from "@vueuse/core";
import { defineStore } from "pinia";
import { computed } from "vue";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: useLocalStorage('nama', 'kosong'),
    token: useLocalStorage('tkn', null), // Pastikan token di sini
  }),
  getters: {
    isAuthenticated: (state) => {
      return state.token !== null && state.token !== '';
    },
    getUser: (state) => {
      return state.user;
    }
  },
  actions: {
    setToken(token) {
      this.token = token; // Mengupdate token secara reaktif
    },
    clearToken() {
      this.token = null; // Menghapus token
    },
    updateUser(name) {
      this.user = name; // Mengupdate user dengan nama baru
    },
  }
});
