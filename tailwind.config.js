const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  daisyui: {
    themes: [
      {
        mytheme: {

          "primary": "#3b82f6",

          "secondary": "#91bde6",

          "accent": "#1FB2A6",

          "neutral": "#191D24",

          "base-100": "#fff",

          "info": "#3ABFF8",

          "success": "#36D399",

          "warning": "#FBBD23",

          "error": "#F87272",
        },
      },
    ],
  },

  plugins: [require('@tailwindcss/forms'), require("daisyui")],
};
