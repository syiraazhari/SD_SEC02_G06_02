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
                'poppins': ['Poppins', 'sans-serif'],
                'roboto': ['Roboto', 'sans-serif'],
                'prompt': ['Prompt', 'sans-serif'],
                'Ubuntu': ['Ubuntu', 'sans-serif'],
                'robotoSlab': ['Roboto Slab', 'serif']
            },
            width: {
                500: '500px'
            },

            colors: {
                blackie: "#212121",
                primary: "#FDC226",
                secondary: {
                    400: "#876152",
                    500: "#774B3A",
                    600: "#57210B"
                },

                background: "#EEEEEE",
            },
            borderRadius: {
                'sm': '5px'
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
