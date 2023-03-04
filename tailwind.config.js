/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            gridTemplateColumns: {
                "custom": "auto 300px"
            },
            backgroundColor: {
                "dark": "#111827",
                "dark-secondary": "#222B3A",
                "f": "#252E3C",
                "my-indigo": "#6C63FF"
            },
            textColor:{
                "my-indigo": "#6C63FF"
            },
            gradientColorStops:{
                "dark": "#111827",
                "dark-secondary": "#222B3A",
                "my-indigo": "#6C63FF"
            },
            spacing: {
                "300": "300px",
                "400": "400px",
                "100": "100px",
                "200": "200px",
            },
            borderColor: {
                "dark": "#111827",
                "dark-secondary": "#222B3A",
                "my-indigo": "#6C63FF"
            }
        },
    },
    plugins: [],
}
