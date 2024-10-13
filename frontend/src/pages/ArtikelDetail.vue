<template>
    <div class="container mx-auto my-10 p-5 bg-white rounded-lg shadow-xl mt-24">
      <h1 class="text-4xl font-bold text-primaryColor mb-5">{{ artikel.title }}</h1>
      <img
        v-if="artikel.gambar"
        src="/public/img-3.png"
        alt="Gambar Artikel"
        class="w-full h-60 object-cover rounded-lg mb-5"
      />
      <p class="text-gray-600 mb-5">{{ formattedDate(artikel.publish_date) }}</p>
      <p class="text-gray-800 leading-relaxed mb-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda veniam, iusto provident maxime facere laudantium optio ut suscipit architecto sequi asperiores repellat officiis possimus veritatis quibusdam voluptatem. Fugit, neque. Nihil dolor architecto quaerat consequatur illo praesentium asperiores alias laborum fugit similique, consequuntur ullam sint id est voluptatibus, reiciendis quasi pariatur reprehenderit culpa necessitatibus perspiciatis blanditiis placeat sunt enim. Quam temporibus odit dolores voluptate nihil esse maxime officiis omnis, in debitis natus architecto saepe veritatis beatae quas! Eaque praesentium provident ut expedita consequatur ipsa dolores inventore molestias iusto illum veritatis ad debitis, esse quia facere libero tenetur tempora impedit! Sit, eligendi voluptate quas in numquam doloribus dolore quam quibusdam recusandae officiis tenetur? Atque libero ab molestias magni quis earum dolores, non sint labore illo quibusdam, quam fugiat ratione sequi corporis dolorem repudiandae laudantium aperiam. Itaque culpa eos ex consectetur? Totam dolorem saepe labore culpa temporibus blanditiis veritatis eum, ducimus vero quam at reprehenderit provident quidem quo possimus unde nulla laboriosam doloremque dicta sunt quasi numquam tempore perferendis? Necessitatibus sunt similique omnis ullam itaque pariatur. Quidem alias quaerat, exercitationem ipsa omnis maxime quis aperiam fuga suscipit eos quam odit repellendus natus? Dolorem enim at, voluptas rerum placeat minus animi, dolore quas delectus maxime veritatis quam modi cupiditate inventore in mollitia! Consectetur laborum repellat voluptatum laboriosam qui quos quisquam possimus fuga beatae, eveniet doloribus reprehenderit alias illum aperiam assumenda expedita impedit commodi ipsum blanditiis nam sequi. Laudantium officia sit odio ab doloribus alias quasi asperiores sapiente repellendus? Dolorum aut expedita asperiores sit quasi necessitatibus dolorem nihil iure sint a aliquam doloribus beatae neque sapiente nesciunt hic soluta, quo enim at molestias laudantium ipsam quidem. Eius animi nulla illo reprehenderit optio ex sit? Fugit, distinctio impedit. Laudantium officiis error impedit. Consectetur quisquam in commodi? Temporibus quo saepe cumque veritatis magnam velit repellendus quae labore?</p>
      <a
        href="/"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
      >
        Kembali ke Beranda
        <svg
          class="rtl:rotate-180 w-4 h-4 ms-2"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 10"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M1 5h12m0 0L9 1m4 4L9 9"
          />
        </svg>
      </a>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import { useRoute } from 'vue-router';
  
  const route = useRoute();
  const artikel = ref({});
  
  // Ambil data artikel berdasarkan ID saat komponen di-mount
  onMounted(async () => {
    try {
      const response = await axios.get(`http://localhost:8000/artikel/${route.params.id}`); // Ganti dengan endpoint API yang sesuai
      artikel.value = response.data; // Asumsikan response.data adalah objek artikel
    } catch (error) {
      console.error('Error fetching article:', error);
    }
  });
  
  // Format tanggal menjadi lebih mudah dibaca
  const formattedDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString('id-ID', options);
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
  }
  </style>
  