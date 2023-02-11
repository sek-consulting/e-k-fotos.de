/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["index.php", "./pages/**/*.{php,phtml}", "./js/**/*.js"],
  theme: {
    extend: {},
    container: {
      // BOOTSTRAP-LIKE BREAKPOINTS
      screens: {
        sm: "540px",
        md: "720px",
        lg: "960px",
        xl: "1140px",
        "2xl": "1320px",
      },
    },
  },
  plugins: [],
};
