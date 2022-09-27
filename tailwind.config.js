/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './templates/**/*.html.twig',
      './node_modules/tw-elements/dist/js/**/*.js'],
  theme: {
    extend: {
      boxShadow: {
        'gn': '0 5px 10px 5px rgba(0,0,0,0.1)',
      },
      colors: {
        'grisrs' : '#D8D8D8',
        'grisrshover' : '#A8A7A7',
        'blackbtn' : '#2C2C2C',
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}
