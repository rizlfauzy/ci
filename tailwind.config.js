/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: "class",
  content: ["./public/*.php", "./public/**/*.{js,css,scss}","./app/views/**/*.php"],
  theme: {
    container: {
      center: true,
      padding: "16px",
    },
    extend: {
      screens: {
        "2xl": "1320px",
      },
      colors: {
        dark: "#0f172a",
        "primary-bg": "#cc7000",
        "primary-text": "#ffe3ab",
        "secondary-bg": "#f7b359",
        "secondary-text": "#e7cf8d",
        "tertiary-bg": "#f0bb86",
        "tertiary-text": "#949494",
      },
      fontSize: {
        "2xs": "0.5rem",
        md: "1rem",
      },
    },
  },
  plugins: [],
}
