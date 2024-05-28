/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      './public/index.php',
      './src/views/**/*.{html,php,js}', // Assurez-vous que ce chemin correspond à la structure de votre projet
  ],
  theme: {

    extend: {
        colors: {
            'primary': {
                '50': '#8F9AD9',
                '100': '#5A73BF',
            },
            'secondary': {
                '50': '#1F4373',
                '100': '#012840'
            },
            'accent' :'#F29057',
            'customWhite': '#F0FAFF',
            'customBlack': '#001E35'

        },
        fontFamily: {
            heebo: ['Heebo', 'sans-serif'],
            radio: ['"Radio Canada Big"', 'sans-serif'],
            sono: ['Sono', 'sans-serif'],
            vollkorn: ['Vollkorn', 'serif'],
        },

    },
  },
  plugins: [],
}

