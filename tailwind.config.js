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
<<<<<<< HEAD
      },
      fontFamily: {
        'roboto': ['roboto', defaultTheme.fontFamily.sans],
      },
=======
      }
>>>>>>> 7a6f0e12238485af0ec8df684d9119f205c57c55
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
