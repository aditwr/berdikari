const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                laila: ["Laila", "sans-serif"],
                default: ["Roboto", "sans-serif"],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("tw-elements/dist/plugin"),
        require("@tailwindcss/line-clamp"),
    ],
};
