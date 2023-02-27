/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            animation: {
                pulse: 'pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                spin: 'spin 1s linear infinite',
            },
            keyframes: {
                pulse: {
                    '0%': { opacity: '1' },
                    '50%': { opacity: '.5' },
                    '100%': { opacity: '1' }
                },
                spin: {
                    to: { transform: 'rotate(360deg)' }
                }
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
