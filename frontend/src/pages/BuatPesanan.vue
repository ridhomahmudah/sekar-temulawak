<script setup>
import { ref, computed } from 'vue';
import { useCartStore } from '@/storage/cartStore';
import { useRouter } from 'vue-router';
import BottomPesanan from '@/components/BottomPesanan.vue';

const cartStore = useCartStore(); // Ambil store cart
const router = useRouter();

// State untuk metode pembayaran
const metodePembayaran = ref('');

// Computed property untuk produk terpilih
const selectedProducts = computed(() => {
  return cartStore.selectedProducts.map(id => {
    return cartStore.produkList.find(produk => produk.id_produk === id);
  }).filter(produk => produk !== undefined); // Filter produk yang tidak terdaftar
});

// Computed property untuk total harga
const totalHarga = computed(() => {
  return selectedProducts.value.reduce((total, produk) => {
    return total + (produk.produk.harga * produk.jumlah);
  }, 0);
});

// Fungsi untuk submit pesanan
const submitPesanan = async () => {
  if (!metodePembayaran.value) {
    alert('Pilih metode pembayaran terlebih dahulu.');
    return;
  }

  try {
    await cartStore.checkout(metodePembayaran.value);
    alert('Pesanan berhasil dibuat!');
    router.push('/'); // Redirect ke halaman utama atau halaman sukses
  } catch (error) {
    console.error('Error during checkout:', error);
    alert('Gagal membuat pesanan. Silakan coba lagi.');
  }
};

</script>

<template>
    <section class="px-36 pt-24 relative">
        <div class="shadow-xl sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead
                    class="text-xs shadow-xl text-white uppercase bg-primaryColor dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" :checked="selectedProducts.length === cartStore.selectedProducts.length"
                                    @change="toggleSelectAll" disabled
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="p-6 font-medium text-lg">Produk</th>
                        <th scope="col" class="px-6 py-3 font-medium text-lg">Harga Satuan</th>
                        <th scope="col" class="px-6 py-3 font-medium text-lg">Kuantitas</th>
                        <th scope="col" class="px-6 py-3 font-medium text-lg">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="produk in selectedProducts" :key="produk.id_produk"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input type="checkbox" @change="toggleSelectProduct(produk.id_produk)"
                                    :checked="true" disabled
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <img class="w-16 h-16" src="../../public/kardusisi24.jpg" alt="Produk image" />
                            <div class="ps-3">
                                <div class="font-se">{{ produk.produk.nama }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-6">Rp {{ produk.produk.harga.toLocaleString() }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-6">{{ produk.jumlah }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-4">Rp {{ (produk.produk.harga * produk.jumlah).toLocaleString() }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <BottomPesanan :total-harga="totalHarga" :submit-pesanan="submitPesanan" />
    </section>
</template>
