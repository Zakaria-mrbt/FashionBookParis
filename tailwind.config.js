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
      gridTemplateColumns: {
        // Simple 3 column grid
        '3': 'repeat(3, minmax(0, 1fr))',

        // Complex site-specific column configuration
        'footer': '200px minmax(900px, 1fr) 100px',
      }
    },
  },
  plugins: [
    require('tw-elements/dist/plugin')
  ],
}