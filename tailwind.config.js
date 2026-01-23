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
                xs: "300px",
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1536px",
                "3xl": "1700px",
                "4xl": "2000px",
                "5xl": "3000px",
                desktop: "1440px",
            },
            colors: {
                primary: "#950101",
                secondary: "#07CAA3",
                thirdary: "#7C0404",
                blackFB: "#0A0A0A",
                whiteFB: "#FBFBFB",
                bgInfo: "#181818",
                bgPopUp: "#111111",
                footerColor: "#660404",

                // Main Color Pallette
                "primary-color": "#121212",
                "secondary-color": "#1a1a1a",
                "third-color": "#222222",
                "success-color": "#00A84F",

                "accent-color": "#950101",
                "accent-secondary-color": "#29405B",

                "inactive-color": "#A1A1A1",
                "gray-button-color": "#F6F6F6",

                "border-color": "#525252",

                "text-primary-color": "#fefefe",
                "text-secondary-color": "#8D8A9D",
            },

            fontFamily: {
                urbanist: ["Urbanist"],
                inter: ["Inter"],
                satoshi: "Satoshi",
            },

            backgroundImage: {
                testi: "url('/public/assets/testi container.svg')",
                heroList: "url('/public/assets/list-game-hero.svg')",
            },
        },
    },
    plugins: [],
};
