<template>
  <div
    class="fixed bottom-0 px-20 z-50 h-20 shadow-custom-up-heavy bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600"
    :style="{ width: `calc(100% - ${2 * 9}rem)` }">
    <div class="text-black flex justify-between items-center h-full">
      <div>
        Produk terpilih: <span>{{ cartStore.selectedProducts.length }} Produk</span>
      </div>
      <div class="flex items-center gap-4">
        <div>
          Total Belanja: <span>Rp {{ totalHarga.toLocaleString() }}</span>
        </div>
        <button
          class="px-6 py-2 bg-primaryColor text-white rounded-lg hover:bg-secondColor cursor-pointer transition-colors duration-150"
          @click="cartStore.checkout()">
          Checkout
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue';
import { useCartStore } from '@/storage/cartStore';

const cartStore = useCartStore(); // Ambil store cart

// Computed property untuk total harga belanja
const totalHarga = computed(() => cartStore.totalHarga());

</script>