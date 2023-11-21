import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inria', ...defaultTheme.fontFamily.sans],
                serif: ['Inria', ...defaultTheme.fontFamily.serif]
            },

            colors:{
                lightgreen: '#CAD2C5',
                mediumgreen: '#84A98C',
                mediumdarkgreen: '#52796F',
                darkgreen: '#354F52',
                darktwogreen: '#2F3E46',
            },
            container: {
                padding: '10rem',
              },
        },
    },

    plugins: [forms],
};
