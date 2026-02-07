/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            width: {
                desktop: "1440px",
            },
            screens: {
                desktop: "1440px",
            },
            fontFamily: {
                poppins: "Poppins",
                satoshi: "Satoshi",
                grotesk: "Hanken Grotesk",
                manrope: "Manrope",
                spaceMono: "Space Mono",
            },

            colors: {
                // Main Color Pallette
                "primary-color": "#ECF2F9",
                "secondary-color": "#FFFFFF",
                "third-color": "#222222",
                "success-color": "#00A84F",

                "accent-color": "#2764FF",
                "accent-secondary-color": "#29405B",
                "inactive-color": "#A1A0A0",
                "gray-button-color": "#F6F6F6",

                "border-color": "#8D8A9D80",

                "text-primary-color": "#38315A",
                "text-secondary-color": "#8D8A9D",
            },
        },
    },
    plugins: [],
};
