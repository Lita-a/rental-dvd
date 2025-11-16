/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: { sans: ["Poppins", "sans-serif"] },
            colors: {
                brand: {
                    pink: "#ec4899",
                    orange: "#f97316",
                    purple: "#9333ea",
                    yellow: "#facc15",
                },
            },
            backgroundImage: {
                "hero-gradient":
                    "linear-gradient(to right, #f97316, #ec4899, #9333ea)",
            },
            boxShadow: { glow: "0 0 20px rgba(250, 204, 21, 0.6)" },
            animation: {
                fadeIn: "fadeIn 0.6s ease-in-out forwards",
                slideUp: "slideUp 0.8s ease-out forwards",
            },
            keyframes: {
                fadeIn: { "0%": { opacity: 0 }, "100%": { opacity: 1 } },
                slideUp: {
                    "0%": { transform: "translateY(20px)", opacity: 0 },
                    "100%": { transform: "translateY(0)", opacity: 1 },
                },
            },
            aspectRatio: { poster: "3 / 4" },
        },
    },
    plugins: [],
};
