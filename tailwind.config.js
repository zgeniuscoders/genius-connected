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
                "custom": "auto 300px",
                "300-auto": "300px auto"
            },
            backgroundColor: {
                "dark": "#050A20",
                "dark-secondary": "#222B3A",
                "f": "#252E3C",
                "my-indigo": "#482D63"
            },
            textColor:{
                "my-indigo": "#482D63"
            },
            gradientColorStops:{
                "dark": "#050A20",
                "dark-secondary": "#222B3A",
                "my-indigo": "#6C63FF"
            },
            fontSize:{
                "10xl": "10rem"
            },
            spacing: {
                "300": "300px",
                "600": "600px",
                "400": "400px",
                "500": "500px",
                "100": "100px",
                "200": "200px",
                "60": "60px",
                "40": "40px",
                "10": "10px",
                "5px": "5px",
                "90vh": "90vh",
                "percent-50": "50%",
            },
            borderColor: {
                "dark": "#111827",
                "dark-secondary": "#222B3A",
                "my-indigo": "#482D63"
            }
        },
    },
    plugins: [],
}
