/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "node_modules/preline/dist/*.js",
    ],
    theme: {
        fontFamily: {
            sans: ["Fredoka", "sans-serif"],
        },
        extend: {},
    },
    plugins: [require("@tailwindcss/forms"), require("preline/plugin")],
};
