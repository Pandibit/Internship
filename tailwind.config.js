import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/hammer/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                body: ["Inter"],
                prompt: ["Prompt"],
            },
            colors: {
                "space-cadet": "#1a2456",
                "atomic-tangerine": "#ff8b68",
                dark: "#080b1b",
                milk: "#f0efed",
            },
            transitionDuration: {
                1500: "1500ms",
            },
        },
    },
    plugins: [
        require("daisyui"),
        require("@tailwindcss/forms"),
        require("flowbite/plugin")({
            datatables: true
        }),
        require("@tailwindcss/aspect-ratio"),
        require('@tailwindcss/typography'),

    ],
};
