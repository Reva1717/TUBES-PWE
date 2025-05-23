/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './resources/css/**/*.css',
    "node_modules/preline/dist/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("preline/plugin"),
  ],
}
