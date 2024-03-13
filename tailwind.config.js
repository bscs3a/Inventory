/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/**/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
        'russo': ['Russo One'],
      },
      colors: {
        'sidebar': '#262261', // Sidebar color
        'button1': '#FFC955', // Primary color
        'green' : '#008D1F', 
        'warning': '#E29A00',
        'danger': '#C91F41', 
      },
    },
  },
  plugins: [],
}