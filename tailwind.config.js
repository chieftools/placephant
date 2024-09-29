/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                blueaccent: '#398DB9',
                greyaccent: '#ebf2f5'
            }
        },
    },
    plugins: [],
}
