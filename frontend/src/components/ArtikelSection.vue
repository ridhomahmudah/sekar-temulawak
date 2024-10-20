<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const artikelList = ref([]); // State untuk menyimpan daftar artikel

// Ambil data artikel dari API saat komponen di-mount
onMounted(async () => {
  try {
    const response = await axios.get('http://localhost:8000/artikel'); // Ganti dengan endpoint API yang sesuai
    artikelList.value = response.data; // Asumsikan response.data adalah array artikel
  } catch (error) {
    console.error('Error fetching articles:', error);
  }
});
</script>

<template>
  <section id="artikel" class="">
    <h1 class="text-5xl font-semibold text-primaryColor text-center mt-28">
      Artikel Edukasi
    </h1>
    <h3 class="text-xl font-semibold text-zinc-600 text-center mt-4 mb-8">
      Berikut Beberapa Artikel Yang Wajib Anda Ketahui
    </h3>
    <swiper-container :slidesPerView="4" :grid="{ rows: 2, fill: 'row' }" :freeMode="true"
      :pagination="{ clickable: true }" class="w-full h-[1024px] px-14 mb-36" :modules="modules">
      <swiper-slide v-for="artikel in artikelList" :key="artikel.id_artikel">
        <div class="w-80 bg-white rounded-3xl drop-shadow-xl">
          <a :href="'/artikel/' + artikel.id_artikel"> <!-- Link ke detail artikel -->
            <img class="rounded-t-lg" src="/public/artikelImg.jpg" alt="" /> <!-- Gambar dari artikel -->
          </a>
          <div class="p-5">
            <a :href="'/artikel/' + artikel.id_artikel">
              <h5 id="judulArtikel" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ artikel.title }} <!-- Judul dari artikel -->
              </h5>
            </a>
            <p id="bodyArtikel"
              class="mb-3 h-12 font-normal text-gray-700 dark:text-gray-400 overflow-hidden text-ellipsis">
              {{ artikel.body }} <!-- Body dari artikel -->
            </p>
            <a :href="'/artikel/' + artikel.id_artikel"
              class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Baca Selengkapnya
              <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M1 5h12m0 0L9 1m4 4L9 9" />
              </svg>
            </a>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
  </section>
</template>
