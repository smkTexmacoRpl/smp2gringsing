import { defineConfig } from "tailwindcss";

export default defineConfig({
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        darkMode: "class",
        extend: {
            colors: {
                primary: {
                    50: "#effef7",
                    100: "#d9fceb",
                    200: "#baf8d9",
                    300: "#8cf1c2",
                    400: "#59e6a5",
                    500: "#31d789",
                    600: "#23b772",
                    700: "#1e955e",
                    800: "#1d764d",
                    900: "#1a6041",
                    950: "#0d3524",
                },
            },
            keyframes: {
                fadeSlide: {
                    "0%": { opacity: "0" },
                    "5%": { opacity: "1" },
                    "30%": { opacity: "1" },
                    "35%": { opacity: "0" },
                    "100%": { opacity: "0" },
                },
            },
            animation: {
                fadeSlide: "fadeSlide 15s infinite",
            },
        },
    },
});
