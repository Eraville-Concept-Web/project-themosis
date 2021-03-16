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
			gray: colors.trueGray,
			indigo: colors.indigo,
			red: colors.rose,
			yellow: colors.amber,
			purple: {
				DEFAULT: '#a239ca',
			}
		}
	},
	variants: {
		extend: {}
	},
	plugins: [
		require('@tailwindcss/custom-forms'),
	]
}
