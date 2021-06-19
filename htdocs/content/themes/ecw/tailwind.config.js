const colors = require('tailwindcss/colors')

module.exports = {
    purge: false,
    darkMode: false, // or 'media' or 'class'
    important: true,
    theme: {
        extend: {},
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            gesRed: {
                DEFAULT: '#f03424',
                light: '#fc9272'
            },
            blueDarkGes: {
                DEFAULT: '#233e8c'
            },
            blueLightGes: {
                DEFAULT: '#008ed3'
            },
            gesGray: {
                DEFAULT: '#f0f0f0',
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
    }
}
