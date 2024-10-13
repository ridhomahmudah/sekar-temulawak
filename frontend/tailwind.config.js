/** @type {import('tailwindcss').Config} */
export default {
  content: ["./src/**/*.{html,js,vue}",
  ],
  theme: {
    extend: {
      colors:{
        'primaryColor': "#237D31",
        'secondColor': "#1a6526",
        'thirdColor': "#1C6026",
      },
      boxShadow: {
        'custom-up': '0 -4px 6px rgba(0, 0, 0, 0.1)', // Shadow ke atas
        'custom-up-heavy': '0 -6px 8px rgba(0, 0, 0, 0.2)', // Shadow berat ke atas
      },
      fontFamily:{
        sans: 'Poppins'
      },
      fontSize: {
        base: '20px',  // Atur ukuran default menjadi 20px untuk teks tanpa ukuran spesifik
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

