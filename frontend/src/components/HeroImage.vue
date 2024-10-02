<script>
export default {
  name: "Hero",

  data() {
    return {
      images: [
        { src: "/public/img-1.png", alt: "Gambar 1" },
        { src: "/public/img-3.png", alt: "Gambar 2" },
        { src: "/public/img-3.png", alt: "Gambar 3" },
      ],
    };
  },
};
</script>

<template>
  <section class="px-10 mb-64">
    <swiper-container
    :slides-per-view="1"
    :space-between="16"
    :centered-slides="true"
    :pagination="{
      hideOnClick: true,
    }"
    :grabCursor="true"
    @swiperprogress="onProgress"
    @swiperslidechange="onSlideChange"
    class="pt-24"
  >
    <swiper-slide v-for="(image, index) in images" :key="index">
      <img
        :src="image.src"
        :alt="image.alt"
        class="rounded-3xl w-full h-full"
      />
    </swiper-slide>
  </swiper-container>

  <!-- APA ITU SARI TEMULAWAK -->
  <div class="flex overflow-y-visible mt-48 mb-48">
    <div class="pl-20 pt-16 w-[70%]">
      <h1 class="text-5xl font-bold text-primaryColor mb-4">
        APA ITU SARI TEMULAWAK?
      </h1>
      <p class="text-justify text-xl leading-9">
        Jamu Temulawak adalah minuman herbal tradisional yang berasal dari
        Indonesia, terbuat dari rimpang temulawak (Curcuma xanthorrhiza).
        Temulawak merupakan tanaman yang termasuk dalam keluarga jahe-jahean dan
        dikenal karena berbagai manfaat kesehatannya. Jamu ini telah digunakan
        selama berabad-abad dalam pengobatan tradisional Indonesia sebagai
        suplemen alami untuk meningkatkan kesehatan tubuh. Temulawak tumbuh
        subur di daerah tropis, termasuk Indonesia. Rimpangnya berwarna kuning
        hingga oranye terang, mirip dengan kunyit, tetapi ukurannya lebih besar.
        Tanaman ini dipercaya memiliki khasiat yang tidak hanya dapat
        menyembuhkan berbagai penyakit, tetapi juga menjaga keseimbangan tubuh
        secara keseluruhan. Di masa lalu, jamu temulawak sering diolah oleh
        tabib atau dukun tradisional dan diberikan kepada masyarakat sebagai
        obat alami untuk menjaga kesehatan atau menyembuhkan penyakit ringan.
      </p>
    </div>
    <div class="translate-x-[20%] scale-125">
      <img src="/public/botolLingkar.png" alt="" srcset="" />
    </div>
  </div>

  <!-- Temukan Sari Temulawak -->
  <div class="">
    <h1
      class="text-5xl font-bold text-primaryColor mb-10 text-center px-28 leading-snug"
    >
      Temukan sari temulawak yang Berkualitas hanya di sekar temulawak
    </h1>
    <svg height="20" width="100%" class="mx-auto px-[28rem] stroke-primaryColor stroke-[4px] mb-14">
      <line
        x1="0"
        y1="10"
        x2="100%"
        y2="10"
      />
    </svg>
    <div class="flex items-center px-28 justify-between">
      <img src="/public/heroTemukan.png" alt="" />
      <p class="text-2xl text-justify w-1/2">
        Sekar temulawak menghadirkan produk jamu berkualitas tinggi, disini kami
        selalu memonitoring produk kami dari awal pembuatan sampai pengemasan
        secara baik dan berkala.
      </p>
    </div>
  </div>
  </section>
</template>
<style>
swiper-container {
  --swiper-theme-color: rgb(255, 217, 91);
  --swiper-pagination-bullet-width: 12px;
  --swiper-pagination-bullet-height: 12px;
  --swiper-pagination-position: static;
  --swiper-pagination-margin-top: 20px;
  width: calc(100vw - 20%);
}
</style>
