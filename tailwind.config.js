import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'ibarra': ['Ibarra Real Nova', 'serif'],
            },
            colors: {
                'primary': '#1E293B',
            },
            spacing: {
                'hero-dk': '54rem',
            },
            boxShadow: {
                custom: 'inset 0 0 10px 0 rgba(0, 0, 0, 0.25)',
            },
            backgroundImage: {
                'hero': "url('storage/images/hero_banner.webp')"
            }
        },
    },

    plugins: [forms],
};
