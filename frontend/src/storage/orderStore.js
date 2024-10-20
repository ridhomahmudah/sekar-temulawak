// src/stores/useOrderStore.js

import { defineStore } from 'pinia';
import axios from 'axios';

export const useOrderStore = defineStore('order', {
  state: () => ({
    pesananList: [], 
    currentOrder: null, 
    error: null 
  }),
  
  actions: {
    // Fetch data pesanan dengan handling error
    async fetchPesanan() {
      try {
        const response = await axios.get('http://localhost:8000/pesanan', {
          headers: {
            'id_pengguna': localStorage.getItem('id')
          }
        });
        this.pesananList = response.data;
      } catch (error) {
        this.error = "Gagal mengambil pesanan.";
        console.error(error);
      }
    },

    // Buat pesanan baru saat checkout
    async createPesanan(items, totalBayar) {
      try {
        const response = await axios.post('http://localhost:8000/pesanan', {
          items: items.map(item => ({
            id_produk: item.id_produk,
            jumlah: item.jumlah,
            harga: item.harga,
            total: item.jumlah * item.harga
          })),
          total_bayar: totalBayar,
          id_pelanggan: localStorage.getItem('id')
        });
        this.currentOrder = response.data.pesanan;
        return response.data;
      } catch (error) {
        this.error = "Gagal membuat pesanan.";
        console.error(error);
        return null;
      }
    },

    // Konfirmasi pesanan
    async confirmPesanan(idPesanan, metodePembayaran) {
      try {
        await axios.put(`http://localhost:8000/pesanan/confirm/${idPesanan}`, {
          metode_pembayaran: metodePembayaran
        });
        await this.fetchPesanan();
      } catch (error) {
        this.error = "Gagal mengonfirmasi pesanan.";
        console.error(error);
      }
    },

    // Batalkan pesanan
    async cancelPesanan(idPesanan) {
      try {
        await axios.delete(`http://localhost:8000/pesanan/cancel/${idPesanan}`);
        this.pesananList = this.pesananList.filter(p => p.id_pesanan !== idPesanan);
      } catch (error) {
        this.error = "Gagal membatalkan pesanan.";
        console.error(error);
      }
    }
  },
});
