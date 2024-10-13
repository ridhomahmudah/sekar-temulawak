// src/stores/useCartStore.js

import { defineStore } from 'pinia';
import axios from 'axios';

export const useCartStore = defineStore('cart', {
  state: () => ({
    produkList: [], // List produk di keranjang
    selectedProducts: [], // Produk yang dipilih untuk checkout
    allSelected: false // Status apakah semua produk dipilih atau tidak
  }),
  actions: {
    // Mengambil data produk dari backend
    async fetchProduk() {
      try {
        const response = await axios.get('http://localhost:8000/keranjang', {
          headers: {
            'id_pengguna': localStorage.getItem('id') // Kirimkan header 'id_pengguna'
          }
        });
        this.produkList = response.data.map(produk => ({
          ...produk,
          jumlah: produk.jumlah // Pastikan 'jumlah' diambil dari backend
        }));
      } catch (error) {
        console.error("Error fetching produk:", error);
      }
    },
    // Toggle semua produk dipilih atau tidak
    toggleSelectAll() {
      this.allSelected = !this.allSelected;
      if (this.allSelected) {
        this.selectedProducts = this.produkList.map(produk => produk.id_produk);
      } else {
        this.selectedProducts = [];
      }
    },
    // Toggle pemilihan produk individu
    toggleSelectProduct(productId) {
      const index = this.selectedProducts.indexOf(productId);
      if (index === -1) {
        this.selectedProducts.push(productId);
      } else {
        this.selectedProducts.splice(index, 1);
      }
      this.allSelected = this.selectedProducts.length === this.produkList.length;
    },
    // Menambah kuantitas produk
    increment(produk) {
      produk.jumlah++;
      this.updateQuantity(produk);
    },
    // Mengurangi kuantitas produk
    decrement(produk) {
      if (produk.jumlah > 1) {
        produk.jumlah--;
        this.updateQuantity(produk);
      }
    },
    // Memperbarui kuantitas produk secara manual
    async updateQuantity(produk, newQuantity) {
      if (newQuantity >= 1) {
        produk.jumlah = newQuantity;
        try {
          await axios.put(`http://localhost:8000/keranjang/${produk.id_produk}`, {
            jumlah: newQuantity
          }, {
            headers: {
              'id_pengguna': localStorage.getItem('id')
            }
          });
        } catch (error) {
          console.error("Error updating quantity:", error);
        }
      }
    },
    // Menghapus produk dari keranjang
    async deleteProduk(produk) {
      try {
        await axios.delete(`http://localhost:8000/keranjang/${produk.id_produk}`, {
          headers: {
            'id_pengguna': localStorage.getItem('id')
          }
        });
        this.produkList = this.produkList.filter(p => p.id_produk !== produk.id_produk);
        this.selectedProducts = this.selectedProducts.filter(id => id !== produk.id_produk);
      } catch (error) {
        console.error("Error deleting produk:", error);
      }
    },
    // Menghitung total harga berdasarkan produk terpilih
    calculateTotal() {
      return this.selectedProducts.reduce((total, productId) => {
        const produk = this.produkList.find(p => p.id_produk === productId);
        if (produk) {
          total += produk.produk.harga * produk.jumlah;
        }
        return total;
      }, 0);
    },

    //mengambil products yang dipilih
    getSelectedProducts() {
      return this.produkList.filter(produk =>
        this.selectedProducts.includes(produk.id_produk)
      );
    },

    // Menambahkan pesanan baru
    async checkout(metodePembayaran) {
      try {
        const response = await axios.post('http://localhost:8000/checkout', {
          produk: this.selectedProducts.map(id => {
            const produk = this.produkList.find(p => p.id_produk === id);
            return {
              id_produk: id,
              jumlah: produk.jumlah
            };
          }),
          id_pengguna: localStorage.getItem('id'),
          metode: metodePembayaran
        });
        console.log('Pesanan berhasil:', response.data);
        // Kosongkan keranjang setelah checkout berhasil
        this.produkList = [];
        this.selectedProducts = [];
        this.allSelected = false;
      } catch (error) {
        console.error('Error during checkout:', error);
      }
    }
  },
  getters: {
    // Menghitung total harga dengan getter
    totalHarga(state) {
      return state.selectedProducts.reduce((total, productId) => {
        const produk = state.produkList.find(p => p.id_produk === productId);
        if (produk) {
          total += produk.produk.harga * produk.jumlah;
        }
        return total;
      }, 0);
    },
    // Menghitung jumlah produk terpilih
    selectedProductCount(state) {
      return state.selectedProducts.length;
    }
  }
});
