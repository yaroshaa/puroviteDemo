const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundSize: {
                'none': 'none',
                'auto': 'auto',
                'cover': 'cover',
                'contain': 'contain',
                '100%': '100%',
                '120%': '120%',
                '150%': '150%',
                '200%': '200%',
                '16': '4rem',
            },
            screens: {
                'lt': '359px',
                // => @media (min-width: 360px) { ... }

                'sm': '640px',
                // => @media (min-width: 640px) { ... }

                'md': '768px',
                // => @media (min-width: 768px) { ... }

                'lg': '1024px',
                // => @media (min-width: 1024px) { ... }

                'xl': '1280px',
                // => @media (min-width: 1280px) { ... }

                '2xl': '1536px',
                // => @media (min-width: 1536px) { ... }
            }

        },
    },

    plugins: [require('@tailwindcss/forms')],
};


