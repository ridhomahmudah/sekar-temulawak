<script>
import ArtikelSection from '@/components/ArtikelSection.vue';
import About from '@/components/About.vue';
import Hero from '@/components/HeroImage.vue';
import ProdukSection from '@/components/ProdukSection.vue';

export default{
  components: {
    Hero,
    About,
    ProdukSection,
    ArtikelSection,
  }
}
</script>

<template>
    <!-- Home / Header -->
    <Hero/>

    <!-- Produk -->
    <ProdukSection/>

    <!-- Artikel -->
    <ArtikelSection/>

    <!-- Tentang Kami -->
    <About/>

    <!-- Keranjang -->
    <section>
    </section>
</template>