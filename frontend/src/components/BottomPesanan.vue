<template>
    <div class="fixed pt-6 bottom-0 px-20 z-50 h-48 shadow-custom-up-heavy bg-white border-t border-gray-200 dark:bg-gray-700 dark:border-gray-600"
        :style="{ width: `calc(100% - ${2 * 9}rem)` }">
        <div class="w-full h-full">
            Metode Pembayaran
            <div class="flex gap-5 mt-2">
                <button v-for="(method, index) in paymentMethods" :key="index" @click="selectMethod(method)"
                    :class="['px-8 rounded-[5px] border-gray-400 border border-solid transition-all', selectedMethod === method ? 'bg-primaryColor text-white' : 'hover:bg-primaryColor hover:text-white']">
                    {{ method }}
                </button>
            </div>
            <hr class="h-[0.125rem] text-gray-300 bg-gray-300 my-5" />
            <div class="flex justify-between align-items-center">
                <div>
                    Total Belanja: <span class="font-semibold">Rp {{ totalHarga.toLocaleString() }}</span>
                </div>
                <div>
                    <button class="px-14 py-2 text-red-700 font-medium">
                        Batal
                    </button>
                    <button class="px-14 py-2 bg-primaryColor rounded-[5px] text-white" @click="checkout">
                        Bayar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';

export default {
    props: {
        totalDipilih: {
            type: Number,
            default: 0,
        },
        totalHarga: {
            type: Number,
            default: 0,
        },
    },
    setup() {
        // List metode pembayaran
        const paymentMethods = ['BNI', 'BRI', 'BCA', 'DANA'];

        // State untuk metode pembayaran yang dipilih
        const selectedMethod = ref(null);

        // Fungsi untuk memilih metode pembayaran
        const selectMethod = (method) => {
            selectedMethod.value = method;
        };

        // Fungsi untuk checkout
        const checkout = () => {
            if (selectedMethod.value) {
                console.log(`Checkout clicked with method: ${selectedMethod.value}`);
                // Lakukan logic checkout, seperti redirect ke halaman pembayaran
            } else {
                alert('Pilih metode pembayaran terlebih dahulu.');
            }
        };

        return {
            paymentMethods,
            selectedMethod,
            selectMethod,
            checkout
        };
    },
};
</script>
