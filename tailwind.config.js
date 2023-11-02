/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    colors:{
      'primary': '#001C55',
      'secondary': '#DD1C1A',
      'accent': '#FFCF56',
      'error': '#F9B3D1',
      'success': '#7BD389',
    },
    fontFamily: {
      'sans': ['Poppins','sans-serif'],
      'serif': ['Gabarito','serif']
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

