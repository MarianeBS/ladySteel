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
            fontFamily: 
            {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: 
            {
                'tall-0': { 'raw': '(min-height: 0px)' },
                'tall-1000': { 'raw': '(min-height: 1000px)' },
            }
        },
    },

    plugins: [forms],
};
