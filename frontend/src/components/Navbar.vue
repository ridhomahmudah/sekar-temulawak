<template>
    <nav class="fixed z-10 flex justify-between h-16 bg-white drop-shadow-xl w-full items-center px-36 mb-16">
        <img src="/public/img/logo-sekar.png" class="w-20 self-start" alt="Logo Sekar Temulawak" />
        <div class="flex gap-8">
            <RouterLink to="/">Home</RouterLink>
            <RouterLink to="/landingproduk">Produk</RouterLink>
            <RouterLink to="/landingartikel">Artikel</RouterLink>
            <RouterLink to="/landingabout">Tentang Kami</RouterLink>
            <RouterLink to="/keranjang">Keranjang</RouterLink>
        </div>
        <div>
            <RouterLink to="/login" class="outline outline-2 outline-primaryColor px-4 py-2 text-center mr-4 rounded-md">Masuk</RouterLink>
            <RouterLink to="/register" class="px-4 py-2 text-center text-white bg-primaryColor rounded-md">Daftar</RouterLink>
        </div>
    </nav>
</template>
