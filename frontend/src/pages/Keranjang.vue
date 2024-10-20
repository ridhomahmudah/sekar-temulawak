<template>
  <section class="px-36 pt-24 relative">
    <div v-if="cartStore.keranjangList.length > 0" class="shadow-xl sm:rounded-lg">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs shadow-xl text-white uppercase bg-primaryColor dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <td class="w-4 p-4">
              <div class="flex items-center">
                <input id="checkbox-all" type="checkbox" :checked="cartStore.allSelected" @change="toggleSelectAll()"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
                <label for="checkbox-all" class="sr-only">checkbox</label>
              </div>
            </td>
            <th scope="col" class="p-6 font-medium text-lg">Produk</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Harga Satuan</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Kuantitas</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Total Harga</th>
            <th scope="col" class="px-6 py-3 font-medium text-lg">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="produk in cartStore.keranjangList" :key="produk.id_produk" class="bg-white border-b">
            <td class="w-4 p-4">
              <div class="flex items-center">
                <input type="checkbox" @change="toggleSelectProduct(produk.id_produk)"
                  :checked="cartStore.selectedProducts.includes(produk.id_produk)"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded">
              </div>
            </td>
            <td class="flex items-center px-6 py-4">
              <img class="w-16 h-16" src="../../public/kardusisi24.jpg" alt="Produk image" />
              <div class="ps-3">
                <div class="font-semibold">{{ produk.produk.nama }}</div>
              </div>
            </td>
            <td class="px-6 py-4">Rp {{ produk.produk.harga.toLocaleString() }}</td>
            <td class="px-6 py-4">
              <form class="w-max">
                <div class="relative flex items-center max-w-[8rem]">
                  <button type="button" @click="decrement(produk)"
                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h16" />
                    </svg>
                  </button>
                  <input type="text" v-model.number="produk.jumlah"
                    class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="999" required />
                  <button type="button" @click="increment(produk)"
                    class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                    </svg>
                  </button>
                </div>
              </form>
            </td>
            <td class="px-6 py-4">
              <span>Rp {{ (produk.produk.harga * produk.jumlah).toLocaleString() }}</span>
            </td>
            <td class="px-6 py-4">
              <button @click="deleteProduk(produk)"
                class="p-2 text-sm font-medium text-white bg-red-500 rounded-lg focus:ring-4 focus:outline-none">
                Hapus
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-else class="text-center py-20">
      <p class="text-lg font-semibold text-gray-500">Tidak ada produk di keranjang</p>
    </div>
    <BottomTable v-if="cartStore.keranjangList.length > 0" />
  </section>
</template>

<script setup>
import { onBeforeMount } from 'vue';
import { useCartStore } from '@/storage/cartStore';
import BottomTable from '@/components/BottomKeranjang.vue';

const cartStore = useCartStore();

onBeforeMount(() => {
  cartStore.fetchKeranjang(); // Fetch produk saat page di-load
});

const toggleSelectAll = () => cartStore.toggleSelectAll();
const toggleSelectProduct = (productId) => cartStore.toggleSelectProduct(productId);
const increment = (produk) => cartStore.increment(produk);
const decrement = (produk) => cartStore.decrement(produk);
const updateQuantity = (produk) => cartStore.updateQuantity(produk);
const deleteProduk = (produk) => cartStore.deleteProduk(produk);
</script>
