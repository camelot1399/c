const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
            },
            flex: {
                '1/4': '0 0 25%',
                '1/2': '0 0 50%',
                '1': '0 0 100%'

            },
            spacing: {
                '1': '1rem',
                '5px': '5px',
                '10px': '10px',
                '15px': '15px',
                '20px': '20px',
                '40px': '40px',
                '30px': '30px'
            },
            colors: {
                'nav-link': '#66c323',
            },
            textColor: {
                'nav-link-color': '#66c323'
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['active'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
