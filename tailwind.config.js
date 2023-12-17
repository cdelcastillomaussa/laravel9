/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      // colors: {
      //   dark: {
      //     100: '#f0f0f0', // Por ejemplo, define tus colores oscuros aquí
      //     // Agrega más colores oscuros según sea necesario
      //   },
      // },
    },
  },
  plugins: [require('@tailwindcss/forms')],
}

