import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

function withOpacity(variableName) {
    return ({ opacityValue }) => {
        if (opacityValue !== undefined) {
            return `rgba(var(${variableName}), ${opacityValue})`;
        }

        return `rgb(var(${variableName}))`;
    };
}

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    darkMode: "selector",

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            backgroundColor: {
                primary: withOpacity("--color-primary"),
                seconday: withOpacity("--color-secondary"),
                accent1: withOpacity("--color-accent-1"),
                accent2: withOpacity("--color-accent-2"),
                hover: withOpacity("--color-hover"),
                fill: withOpacity("--background-fill"),
            },

            textColor: {
                primary: withOpacity("--color-primary"),
                seconday: withOpacity("--color-secondary"),
                accent1: withOpacity("--color-accent-1"),
                accent2: withOpacity("--color-accent-2"),
                hover: withOpacity("--color-hover"),
                fill: withOpacity("--color-fill"),
            },
        },
    },

    plugins: [forms],
};
