<template>
  <section class="bg-primaryColor py-16 px-16" id="produk">
    <h1 class="px-2 text-5xl text-white font-semibold mb-14">
      Produk Unggulan Kami
    </h1>
    <swiper-container
      :slidesPerView="4"
      :spaceBetween="40"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      class="w-full"
      ref="swiper"
    >
      <swiper-slide v-for="n in 10">
        <div
          id="card"
          class="w-[320px] h-[390px] bg-white rounded-3xl drop-shadow-xl"
        >
          <img
            src="/public/img/produkpng.png"
            alt=""
            srcset=""
            class="w-full"
          />
          <div id="text" class="-translate-y-14 px-6 flex flex-col gap-3">
            <h3 class="font-semibold">
              Temulawak Cup 120 ml (1 Dus isi 24 cup)
            </h3>
            <p class="font-semibold">
              Diskon:
              <span class="inline-flex ml-2 items-center font-semibold"
                >20
                <iconify-icon
                  icon="tabler:rosette-discount-filled"
                  width="20px"
                  height="20px"
                  style="color: #f44336"
                ></iconify-icon
              ></span>
            </p>
            <div class="flex items-center font-semibold justify-between pr-2">
              <p>Rp. 50.000</p>
              <div class="flex items-center gap-3">
                <iconify-icon icon="mdi:cart" width="1.4rem" height="1.4rem"  style="color: #f44336"></iconify-icon>
                <button class="bg-red-700 px-4 py- text-white rounded-md">Beli</button>
              </div>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
  </section>
</template>
<script>
export default {
  mounted() {
    // Akses elemen Swiper setelah komponen terpasang
    const swiperEl = this.$refs.swiper;
    // Akses elemen pagination di dalam shadowRoot
    const paginationEl =
      swiperEl.shadowRoot.querySelector(".swiper-pagination");

    paginationEl.style.position = "static";
    paginationEl.style.marginTop = "50px";
  },
};
</script>
