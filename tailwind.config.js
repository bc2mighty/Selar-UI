module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primarycolor: "#F9A826",
        btnBackgroundColor: "#5a0b4d",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
