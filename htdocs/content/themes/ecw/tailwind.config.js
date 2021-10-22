const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    important: true,
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            green: colors.emerald,
            red: colors.red,
            gray: colors.gray,
            ecwPrimary: {
                DEFAULT: '#2596BE'
            },
            ecwSecondary: {
                DEFAULT: '#545454'
            },
        },
        fontFamily: {
            'headings': ['Roboto Slab'],
            'body': ['Open Sans']
        }
    },
    variants: {
        extend: {
            borderWidth: ['hover'],
        }
    },
    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
