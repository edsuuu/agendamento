import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            'blue-black': '#043873',
            'blue-white': '#4F9CF9',
            'blue-link': '#0084ff',
            'blue-button': '#043873dd',
            'white-color': '#fff',
            'white-opaco': '#ECE9E9',
            'border-gray': '#0000005f'

        }
    },
    plugins: [],
};
