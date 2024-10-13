<template>
  <div
    class="fixed bottom-0 px-20 z-50 h-20 shadow-custom-up-heavy bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600"
    :style="{ width: `calc(100% - ${2 * 9}rem)` }">
    <div class="text-black flex justify-between items-center h-full">
      <div>
        Produk terpilih: <span>{{ selectedProductCount }} Produk</span>
      </div>
      <div class="flex items-center gap-4">
        <div>
          Total Belanja: <span>Rp {{ totalHarga.toLocaleString() }}</span>
        </div>
        <button
          class="px-6 py-2 bg-primaryColor text-white rounded-lg hover:bg-secondColor cursor-pointer transition-colors duration-150"
          @click="checkout()">
          Checkout
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useCartStore } from '@/storage/cartStore';
import { useRouter } from 'vue-router';
import axios from 'axios';


const cartStore = useCartStore(); // Ambil store cart
const router = useRouter();

// Computed property untuk jumlah produk terpilih
const selectedProductCount = computed(() => cartStore.selectedProducts.length);

// Computed property untuk total harga belanja
const totalHarga = computed(() => cartStore.totalHarga);

// Fungsi untuk checkout
const checkout = async () => {
  if (selectedProductCount.value === 0) {
    alert('Pilih produk sebelum membuat pesanan.');
    return;
  }
  const data = cartStore.getSelectedProducts();
  console.log(data);
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
      total_bayar: totalHarga.value,
    });

    if (response.status === 200) {
      alert('Pesanan berhasil dibuat!');

      // router.push(`/pembayaran/${response.data.pesanan.id_pesanan}`); // Redirect ke halaman pembayaran
      router.push('/pesanan');
    }
  } catch (error) {
    console.error('Error saat membuat pesanan:', error);
    alert('Terjadi kesalahan saat membuat pesanan. Silakan coba lagi.');
  }
};
</script>