/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './public/index.php',
      './src/views/**/*.{html,php,js}', // Assurez-vous que ce chemin correspond à la structure de votre projet
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

