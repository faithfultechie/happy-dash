/** @type {import('tailwindcss').Config} */

const colors = require("tailwindcss/colors");

export default {
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js"),
        require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/resources/**/*.blade.php",
        "./app/Http/Livewire/**/*Table.php",
        "./vendor/power-components/livewire-powergrid/resources/views/**/*.php",
        "./vendor/power-components/livewire-powergrid/src/Themes/Tailwind.php",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    options: {
        safelist: {
            pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
            variants: ["sm", "md", "lg", "xl", "2xl", "3xl", "4xl"],
        },
    },
    theme: {
        extend: {
            "pg-primary": colors.gray,
        },
        fontFamily: {
            sans: ["Hind", "sans-serif"],
        },
    },
    plugins: [],
};
