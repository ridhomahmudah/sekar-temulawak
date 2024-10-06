<script></script>
<template>
  <section id="artikel" class="">
    <h1 class="text-5xl font-semibold text-primaryColor text-center mt-28">
      Artikel Edukasi
    </h1>
    <h3 class="text-xl font-semibold text-zinc-600 text-center mt-4 mb-8">
      Berikut Beberapa Artikel Yang Wajib Anda Ketahui
    </h3>
    <swiper-container
      :slidesPerView="4"
      :grid="{ rows: 2, fill: row }"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      class="w-full h-[900px] px-14 mb-36"
      :modules="modules"
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
                <iconify-icon
                  icon="mdi:cart"
                  width="1.4rem"
                  height="1.4rem"
                  style="color: #f44336"
                ></iconify-icon>
                <button class="bg-red-700 px-4 py- text-white rounded-md">
                  Beli
                </button>
              </div>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
  </section>
</template>
