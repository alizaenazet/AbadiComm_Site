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
    fontSize: {
      'headline-lg': ['72px'],
      'h1-lg': ['48px'],
      'h2-lg': ['32px'],
      'h3-lg': ['24px'],
      'medium-lg': ['18px'],
      'normal-lg': ['16px'],
      'input-lg': ['15px'],

      'headline-sm': ['30px'],
      'h1-sm': ['21px'],
      'h2-sm': ['18.5px'],
      'h3-sm': ['17.5px'],
      'medium-sm': ['16px'],
      'normal-sm': ['14px'],
      'input-sm': ['13px']
    },
    padding:{
    },
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

