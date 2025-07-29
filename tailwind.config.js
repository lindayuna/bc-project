/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                primary: "#db2777",
                dark: "#0f172a",
            },
        },
    },
    plugins: [],
};
