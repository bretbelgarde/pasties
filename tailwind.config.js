/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: ["./templates/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        'mono': ['Fira Code', ...defaultTheme.fontFamily.mono],
        'default': ['Raleway', ...defaultTheme.fontFamily.sans]
      }
    }
  },
  plugins: []
}
