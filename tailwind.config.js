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
        "./resources/views/**/*.blade.php"
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
                hover1: withOpacity("--btn-hover-color1"),
                hover2: withOpacity("--btn-hover-color2"),
                hover3: withOpacity("--btn-hover-color3"),
                fill: withOpacity("--background-fill"),
                font: withOpacity("--font-color"),
                header: withOpacity("--font-color1"),
            },

            textColor: {
                primary: withOpacity("--color-primary"),
                seconday: withOpacity("--color-secondary"),
                accent1: withOpacity("--color-accent-1"),
                accent2: withOpacity("--color-accent-2"),
                hover: withOpacity("--color-hover"),
                fill: withOpacity("--color-fill"),
                font: withOpacity("--font-color"),
                header: withOpacity("--font-color1"),
            },
        },
    },

    plugins: [forms],
};
