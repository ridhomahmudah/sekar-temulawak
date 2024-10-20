// src/stores/useCartStore.js
import { defineStore } from "pinia";
import axios from "axios";
import router from "@/router/Route.vue";

export const useCartStore = defineStore("cart", {
  state: () => ({
    keranjangList: [],
    produkList: [],
    selectedProducts: [],
    allSelected: false,
  }),

  actions: {
    // Fetch produk dari backend, simpan ke state, dan lakukan persistensi
    async fetchKeranjang() {
      try {
        const response = await axios.get("http://localhost:8000/keranjang", {
          headers: {
            id_pengguna: localStorage.getItem("id"),
          },
        });
        this.keranjangList = response.data;
      } catch (error) {
        console.error("Error fetching produk:", error);
      }
    },

    async fetchProduk() {
      try {
        const response = await axios.get("http://localhost:8000/produk");
        this.produkList = response.data;
      } catch (error) {
        console.error("Error fetching produk:", error);
      }
    },

    async addToCart(produk) {
      try {
        const userId = localStorage.getItem("id"); // Mendapatkan id dari localStorage
        if (!userId) {
          throw new Error("User ID tidak ditemukan di localStorage");
        }

        const response = await axios.post("http://localhost:8000/keranjang", {
          id_produk: produk.id_produk,
          kuantitas: 1,
          id_pengguna: userId,
        });

        if (response.status === 200 || response.status === 201) {
          alert("Produk Berhasil Ditambahkan Ke Keranjang");
        }
      } catch (error) {
        console.error("Error menambahkan produk ke keranjang:", error);
      }
    },

    // Method untuk checkout
    async checkout() {
      if (this.selectedProducts.length === 0) {
        alert('Pilih produk sebelum membuat pesanan.');
        return;
      }
      const data = this.getSelectedProducts();
    
      const produk = data.map(keranjang => ({
          id_produk: keranjang.id_produk,
          jumlah: keranjang.jumlah,
          harga: keranjang.produk.harga,
          total: keranjang.produk.harga * keranjang.jumlah,}));
      console.log(produk);
    
      try {
        const response = await axios.post('http://localhost:8000/pesanan/create', {
          id_pelanggan: localStorage.getItem('id'),
          items: produk,
          total_bayar: this.totalHarga(),
        });
    
        if (response.status === 200) {
          alert('Pesanan berhasil dibuat!');
          router.push(`/buat/pesanan/${response.data.pesanan.id_pesanan}`);
        }
      } catch (error) {
        console.error('Error saat membuat pesanan:', error);
        alert('Terjadi kesalahan saat membuat pesanan. Silakan coba lagi.');
      }
      
    },

    // Tambah kuantitas produk dan update ke backend
    increment(produk) {
      produk.jumlah++;
    },

    // Kurangi kuantitas produk jika lebih dari 1
    decrement(produk) {
      if (produk.jumlah > 1) {
        produk.jumlah--;
      }
    },

    // Update kuantitas produk ke backend
    async updateQuantity(produk) {
      try {
        await axios.put(
          `http://localhost:8000/keranjang/${produk.id_produk}`,
          {
            jumlah: produk.jumlah,
          },
          {
            headers: { id_pengguna: localStorage.getItem("id") },
          }
        );
      } catch (error) {
        console.error("Error updating quantity:", error);
      }
    },

    // Hapus produk dari keranjang dan backend
    async deleteProduk(produk) {
      try {
        await axios.delete(
          `http://localhost:8000/keranjang/${produk.id_produk}`,
          {
            headers: { id_pengguna: localStorage.getItem("id") },
          }
        );
        this.keranjangList = this.keranjangList.filter(
          (p) => p.id_produk !== produk.id_produk
        );
      } catch (error) {
        console.error("Error deleting produk:", error);
      }
    },

    // Simpan produk yang dipilih
    toggleSelectProduct(productId) {
      if (this.selectedProducts.includes(productId)) {
        this.selectedProducts = this.selectedProducts.filter(id => id !== productId);
      } else {
        this.selectedProducts.push(productId);
      }
      console.log("Selected Products:", this.selectedProducts); // Tambahkan log untuk memeriksa
    },

    // Toggle select all products
    toggleSelectAll() {
      this.allSelected = !this.allSelected;
      if (this.allSelected) {
        this.selectedProducts = this.keranjangList.map((p) => p.id_produk);
      } else {
        this.selectedProducts = [];
      }
    },

    // Dapatkan produk yang dipilih
    getSelectedProducts() {
      const selected = this.keranjangList.filter((p) =>
        this.selectedProducts.includes(p.id_produk)
      );
      console.log("Selected Products:", selected); // Log produk yang dipilih
      return selected;
    },
    
    totalHarga() {
      return this.selectedProducts.reduce((total, productId) => {
        const produk = this.keranjangList.find(p => p.id_produk === productId);
        if (produk) {
          total += produk.produk.harga * produk.jumlah;
        }
        return total;
      }, 0);
    },
  }
});
