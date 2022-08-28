/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                blackie: "#212121",
                background: "#F5F7FB"
            },
            fontFamily: {
                Roboto: ["Roboto", "sans-serif"],
                RobotoSlab: ["Roboto Slab", "serif"],
                Prompt: ["Prompt", "sans-serif"]
            },
            width: {
                800: '800px',
                600: '600px',
                700: '700px',
                250: '250px'
            },
            height: {
                400: '400px'
            },
        },
    },
    plugins: [
        require('daisyui')
    ],

    daisyui: {
        styled: true,
        themes: [
            {
                oldtown: {
                    primary: "#FDC223",
                    secondary: "#541800",
                    accent: "#1FB2A6",
                    neutral: "#191D24",
                    info: "#3ABFF8",
                    success: "#36D399",
                    warning: "#FBBD23",
                    error: "#F87272",
                },
            }
        ],
        base: false,
        utils: true,
        logs: true,
        rtl: false,
        prefix: false,
        darkTheme: false,
    },

}
