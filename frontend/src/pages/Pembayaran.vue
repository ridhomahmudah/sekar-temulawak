<template>
  <section class="px-36 pt-24 relative">
    <div class="shadow-xl sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs shadow-xl text-white uppercase bg-primaryColor dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="p-6 font-medium text-lg">Pesanan</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Produk</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Jumlah</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Total Belanja</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Status</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="pesanan in daftarPesanan" :key="pesanan.id_pesanan"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 font-medium">PSN{{ pesanan.id_pesanan }}X</td>
            <td class="flex items-center px-6 py-4">
              <ul>
                <li v-for="detail in pesanan.detail_pesanan" :key="detail.id_detail_pemesanan">
                  <div class="flex items-center">
                    <div class="">
                      <div class="font-semibold">{{ detail.produk.nama }} - {{ detail.jumlah }}x Rp {{
                        detail.harga.toLocaleString() }}</div>
                    </div>
                  </div>
                </li>
              </ul>
            </td>
            <td class="px-6 py-4">
              {{ hitungJumlahProduk(pesanan.detail_pesanan) }}
            </td>
            <td class="px-6 py-4">{{ formatHarga(totalBelanja(pesanan.detail_pesanan)) }}</td>
            <td class="px-6 py-4">{{ pesanan.status }}</td>
            <td class="px-6 py-4">
              <button @click="bayarPesanan(pesanan.id_pesanan)"
                class="px-4 py-2 mr-2 bg-green-500 text-white rounded-md">Bayar</button>
              <button @click="batalkanPesanan(pesanan.id_pesanan)"
                class="px-4 py-2 bg-red-500 text-white rounded-md">Batalkan</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</template>

<script>
import router from '@/router/Route.vue';
import axios from 'axios';

export default {
  data() {
    return {
      daftarPesanan: [], // List pesanan yang akan ditampilkan
    };
  },
  methods: {
    // Format harga dengan format Rupiah atau mata uang lainnya
    formatHarga(harga) {
      return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
      }).format(harga);
    },

    // Menghitung total jumlah produk dalam satu pesanan
    hitungJumlahProduk(detailPesanan) {
      return detailPesanan.reduce((total, detail) => total + detail.jumlah, 0);
    },

    // Mengambil harga satuan dari produk pertama dalam detail pesanan
    hargaSatuan(detailPesanan) {
      return detailPesanan.length > 0 ? detailPesanan[0].harga : 0;
    },

    // Menghitung total belanja dari produk yang dipesan
    totalBelanja(detailPesanan) {
      return detailPesanan.reduce((total, detail) => total + detail.total, 0);
    },

    // Mengambil daftar pesanan dari backend
    async fetchPesanan() {
      try {
        const response = await axios.get('http://localhost:8000/pesanan', {
          headers: {
            'id_pengguna': localStorage.getItem('id') // Mengambil id pengguna
          }
        });
        this.daftarPesanan = response.data;
      } catch (error) {
        console.error('Error fetching pesanan:', error);
      }
    },

    // Fungsi untuk membayar pesanan
    async bayarPesanan(id_pesanan) {

      try {
        const pesanan = this.daftarPesanan.find(p => p.id_pesanan === id_pesanan);

        // Cek apakah pesanan ditemukan dan statusnya PENDING
        if (pesanan && pesanan.status === 'PENDING') {
          // Jika statusnya PENDING, arahkan ke halaman checkout pembayaran
          router.push(`/buat/pesanan/${id_pesanan}`);
          return;
        }
        const response = await axios.post(`http://localhost:8000/pesanan/confirm/${id_pesanan}`, {
          headers: {
            'id_pengguna': localStorage.getItem('id')
          }
        });
        alert('Pembayaran berhasil: ' + response.data.message);
        this.fetchPesanan(); // Refresh pesanan setelah membayar
      } catch (error) {
        console.error('Error membayar pesanan:', error);
      }
    },

    // Fungsi untuk membatalkan pesanan
    async batalkanPesanan(id_pesanan) {
      try {
        const response = await axios.post(`http://localhost:8000/pesanan/cancel/${id_pesanan}`, {
          headers: {
            'id_pengguna': localStorage.getItem('id')
          }
        });
        alert('Pesanan berhasil dibatalkan: ' + response.data.message);
        this.fetchPesanan(); // Refresh pesanan setelah dibatalkan
      } catch (error) {
        console.error('Error membatalkan pesanan:', error);
      }
    }
  },
  mounted() {
    this.fetchPesanan(); // Ambil data pesanan saat komponen dirender
  }
};
</script>