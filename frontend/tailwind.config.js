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

