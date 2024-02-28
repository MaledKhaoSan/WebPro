/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  important: true, // Ensures that !important is applied to classes
  separator: '!', // Configures the separator for your custom class
  variants: {
    extend: {
      display: ['important'], // Allows you to apply !important to display utilities
    },
  },
}
