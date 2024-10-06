<template>
    <section id="artikel">
        <h1 class="text-5xl font-semibold text-primaryColor text-center mt-28">Artikel Edukasi</h1>
        <h3 class="text-xl font-semibold text-zinc-600 text-center mt-4 mb-8">Berikut Beberapa Artikel Yang Wajib Anda Ketahui</h3>
        <swiper-container
      :slidesPerView="4"
      :spaceBetween="40"
      :freeMode="true"
      :pagination="{
        clickable: true,
      }"
      class="w-full px-14"
      ref="swiper"
    >
      <swiper-slide v-for="n in 10">
        <div id="card" class="w-[320px] h-[390px] bg-white rounded-3xl drop-shadow-2xl border-zinc-300 border">
          <img
            src="/public/img/produkpng.png"
            alt=""
            srcset=""
            class="w-full"
          />
          <div id="text" class="-translate-y-14">
            <h3>Temulawak Cup 120 ml (1 Dus isi 24 cup)</h3>
            <p>
              Diskon:
              <span class="inline-flex items-center"
                >20
                <iconify-icon
                  icon="tabler:rosette-discount-filled"
                  width="20px"
                  height="20px"
                  style="color: #f44336"
                ></iconify-icon
              ></span>
            </p>
            <div class="flex items-center">
              <p>Rp. 50.000</p>
              <iconify-icon
                icon="mdi:cart"
                style="color: #f44336"
              ></iconify-icon>
              <button>Beli</button>
            </div>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
    </section>
</template>