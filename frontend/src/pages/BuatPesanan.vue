<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router';
import BottomPesanan from '@/components/BottomPesanan.vue';
import { useOrderStore } from '@/storage/orderStore'; // Pastikan path yang benar

const pesananStore = useOrderStore(); // Ambil store pesanan
const router = useRouter();
const route = useRoute(); // Mengambil route untuk akses parameter

// State untuk metode pembayaran
const metodePembayaran = ref('');

// Ambil id_pesanan dari route parameter
const idPesanan = route.params.id;

// Computed property untuk pesanan terpilih berdasarkan id_pesanan dari route
const selectedPesanan = computed(() => {
    return pesananStore.pesananList.find(pesanan => pesanan.id_pesanan == idPesanan);
});

// Computed property untuk total harga pesanan
const totalHarga = computed(() => {
    if (!selectedPesanan.value) return 0;
    return selectedPesanan.value.detail_pesanan.reduce((total, detail) => {
        return total + (detail.harga * detail.jumlah);
    }, 0);
});

const updateMetodePembayaran = (method) => {
    metodePembayaran.value = method;
};

// Fungsi untuk submit pesanan
const submitPesanan = async () => {
    if (!metodePembayaran.value) {
        alert('Pilih metode pembayaran terlebih dahulu.');
        return;
    }

    try {

        alert('Pesanan berhasil dibuat!');
        router.push('/'); // Redirect ke halaman utama atau halaman sukses
    } catch (error) {
        console.error('Error during checkout:', error);
        alert('Gagal membuat pesanan. Silakan coba lagi.');
    }
};

// Ambil daftar pesanan saat mounted
onMounted(async () => {
    await pesananStore.fetchPesanan();
});
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
                                <input id="checkbox-all" type="checkbox" :checked="true" disabled
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
                    <tr v-if="selectedPesanan" v-for="detail in selectedPesanan.detail_pesanan"
                        :key="detail.id_detail_pemesanan"
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input type="checkbox" :checked="true" disabled
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="flex items-center px-6 py-4">
                            <img class="w-16 h-16" src="../../public/kardusisi24.jpg" alt="Produk image" />
                            <div class="ps-3">
                                <div class="font-semibold">{{ detail.produk.nama }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span>Rp {{ detail.harga.toLocaleString() }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span>{{ detail.jumlah }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span>Rp {{ (detail.harga * detail.jumlah).toLocaleString() }}</span>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="5" class="text-center py-4">Pesanan tidak ditemukan.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <BottomPesanan :total-harga="totalHarga" :submit-pesanan="submitPesanan"
            @update-method="updateMetodePembayaran" />
    </section>
</template>
