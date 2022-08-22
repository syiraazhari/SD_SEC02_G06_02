/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                primary: '#FDC223',
                secondary: '#541800'
            },
            fontFamily: {
                Roboto: ["Roboto", "sans-serif"],
                RobotoSlab: ["Roboto Slab", "serif"],
            }
        },
    },
    plugins: [],
}
