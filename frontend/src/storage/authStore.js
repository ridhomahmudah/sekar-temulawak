// src/stores/authStore.js
import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: {},
    isAuthenticated: false,
    token: null,
  }),
  actions: {
    setUser(user) {
      this.user = user;
    },
    setToken(token) {
      this.token = token;
    },
    setIsAuthenticated(auth){
      this.isAuthenticated = auth;
    },
    getToken(){
      return this.token;
    }
  },
});
