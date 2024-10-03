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
  },
  data() {
        return {
            isLoggedIn: false,
        };
    },
    created() {
        this.checkLoginStatus();
    },
    methods: {
        checkLoginStatus() {
            const queryParams = new URLSearchParams(window.location.search);
            this.isLoggedIn = queryParams.get('loggedIn') === 'true';
        },
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
      <div v-if="isLoggedIn">
            <h2>Welcome back!</h2>
            <!-- Additional content for logged-in users -->
        </div>
    </section>
</template>