/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        dark_background: "#313131",
        blue_background: "#091242",
        light_blue_background: "#0088FF",
        gray_background:"#6C6C6C",

        dark_text_para: ":1E1E1E",

        //home
        solutions_card: "#D9D9D9",
        third_tile: "#D1D2D4",

        //about
        third_tile_about: "#F4F4F4",
      },
      fontFamily: {
        inter: ["Inter"],
      },
      lineHeight: {
        12: "3.5rem",
      },
    },
  },
  plugins: [],
};
