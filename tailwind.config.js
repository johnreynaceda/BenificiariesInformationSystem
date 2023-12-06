import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import preset from "./vendor/filament/support/tailwind.config.preset";

export default {
    presets: [
        preset,
        require("./vendor/wireui/wireui/tailwind.config.js"),
        require("./vendor/tallstackui/tallstackui/tailwind.config.js"),
    ],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",

        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/tallstackui/tallstackui/src/**/*.php",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                main: "#E36C36",
            },
        },
    },

    plugins: [forms],
};
