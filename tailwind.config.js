/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./Views/**/*.php",
    "./index.php",
    "./detalle_vacante_ajax.php"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: '#39A900',
          50: '#E8F8DD',
          100: '#D9F4C8',
          200: '#BBEB9E',
          300: '#9DE274',
          400: '#7FD94A',
          500: '#39A900',
          600: '#2E8700',
          700: '#236500',
          800: '#184300',
          900: '#0D2100',
        },
        secondary: {
          DEFAULT: '#007832',
          50: '#E6F5ED',
          100: '#CCEBDB',
          200: '#99D7B7',
          300: '#66C393',
          400: '#33AF6F',
          500: '#007832',
          600: '#006028',
          700: '#00481E',
          800: '#003014',
          900: '#00180A',
        },
      },
      fontFamily: {
        sans: ['Work Sans', 'sans-serif'],
        secondary: ['Calibri', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
