/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundColor: {
                "dark": "#111827",
                "dark-secondary": "#222B3A",
                "f": "#252E3C"
            },
        },
    },
    plugins: [],
}
