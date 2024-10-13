<template>
  <section class="bg-primaryColor py-16 px-16" id="produk">
    <h1 class="px-2 text-5xl text-white font-semibold mb-14">
      Produk Unggulan Kami
    </h1>
    <swiper-container :slidesPerView="4" :spaceBetween="40" :freeMode="true" :pagination="{ clickable: true }"
      class="w-full" ref="swiper">
      <swiper-slide v-for="produk in produkList" :key="produk.id_produk">
        <div id="card" class="w-[320px] h-[390px] bg-white rounded-3xl drop-shadow-xl">
          <img src="/public/img/produkpng.png" alt="" class="w-full object-cover" />
          <div id="text" class="-translate-y-14 px-6 pt-4 flex flex-col gap-3">
            <h3 class="font-semibold">{{ produk.nama }}</h3> <!-- Mengambil nama produk -->
            <p class="font-semibold">
              Diskon:
              <span class="inline-flex ml-2 items-center font-semibold">
                5
                <iconify-icon icon="tabler:rosette-discount-filled" width="20px" height="20px"
                  style="color: #f44336"></iconify-icon>
              </span>
            </p>
            <div class="flex items-center font-semibold justify-between pr-2">
              <p>Rp. {{ produk.harga }}</p> <!-- Mengambil harga produk -->
              <div class="flex items-center gap-3">
                <iconify-icon icon="mdi:cart" width="1.4rem" height="1.4rem" class="hover"
                  style="color: #f44336; cursor: pointer;" @click="addToCart(produk)"></iconify-icon>
                <!-- Icon cart untuk menambah ke keranjang -->
                <button
                  class="bg-red-700 px-4 hover:bg-red-900 transition-colors duration-150 hover:ease-in text-white rounded-md">Beli</button>
              </div>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>

    <!-- Toast notification -->
    <transition name="fade">
      <div v-if="showToast" class="fixed bottom-10 right-10 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ toastMessage }}
      </div>
    </transition>
  </section>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
  setup() {
    const produkList = ref([]);

    const fetchProduk = async () => {
      try {
        const response = await axios.get('http://localhost:8000/produk');
        produkList.value = response.data;
      } catch (error) {
        console.error('Error fetching produk:', error);
      }
    };

    const addToCart = async (produk) => {
      try {
        const userId = localStorage.getItem('id'); // Mendapatkan id dari localStorage
        if (!userId) {
          throw new Error('User ID tidak ditemukan di localStorage');
        }

        const response = await axios.post('http://localhost:8000/keranjang', {
          id_produk: produk.id_produk,
          kuantitas: 1,
          id_pengguna: userId,
        });

        if (response.status === 200 || response.status === 201) { // Memastikan berhasil
          alert('Produk Berhasil Ditambahkan Ke Keranjang')
        }
      } catch (error) {
        console.error('Error menambahkan produk ke keranjang:', error);
      }
    };

    onMounted(() => {
      fetchProduk();
    });

    return {
      produkList,
      addToCart,
    };
  },



  mounted() {
    // Akses elemen Swiper setelah komponen terpasang
    const swiperEl = this.$refs.swiper;
    // Akses elemen pagination di dalam shadowRoot
    const paginationEl =
      swiperEl.shadowRoot.querySelector(".swiper-pagination");

    paginationEl.style.position = "static";
    paginationEl.style.marginTop = "50px";
  }
};
</script>
