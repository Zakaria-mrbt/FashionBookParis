/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  content: [
    './templates/**/*.html.twig',
    './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {
      boxShadow: {
        'gn': '0 5px 10px 5px rgba(0,0,0,0.1)',
        'ga': '10px 10px 10px 0px rgba(0,0,0,0.1)',

      },

      fontFamily: {
        'roboto': ['roboto', defaultTheme.fontFamily.sans],
      },

      
      colors: {
        'grisrs' : '#D8D8D8',
        'grisrshover' : '#A8A7A7',
        'blackbtn' : '#2C2C2C',
      },

      gridTemplateColumns: {
        // Simple 3 column grid
        '3': 'repeat(3, minmax(0, 1fr))',

        // Complex site-specific column configuration
        'footer': '200px minmax(900px, 1fr) 100px',
      }



    },
  },
  plugins: [
    require('tw-elements/dist/plugin'),
    require('tailwind-scrollbar')
  ],

  variants: {
    scrollbar: ['rounded']
  }
}



