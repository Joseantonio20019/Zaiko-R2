module.exports = {
  content: ["./resources/js/**/*.vue", "./resources/js/**/*.js", "./resources/views/**/*.blade.php",".node_modules/flowbite/**/*.js"],
  theme: {
    extend: {},
  },
  plugins: [

    require('flowbite/plugin'),

  ],
}