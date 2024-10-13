// src/storage/authStore.js
import { useLocalStorage } from "@vueuse/core";
import { defineStore } from "pinia";


export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: useLocalStorage('nama', null),
    token: useLocalStorage('tkn', null), 
    id: useLocalStorage('id', null), 
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
      this.token = token; 
    },
    updateUser(name) {
      this.user = name;
    },
    updateId(id){
      this.id = id;
    }
  }
});

