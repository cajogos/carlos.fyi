/** @type {import('tailwindcss').Config} */
export default {
	content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
	theme: {
		extend: {
			colors: {
				'cajogos-blue': '#3B82F6', // Brighter, more vibrant blue
				'cajogos-blue-light': '#60A5FA', // Lighter blue for hover states
				'cajogos-blue-dark': '#1D4ED8', // Darker blue for text
				'global-orangered': '#F87171', // Softer red
				'global-yellow': '#FBBF24', // Warmer yellow
				'link-blue': '#93C5FD', // Light blue for better link readability
				'link-hover': '#DBEAFE', // Very light blue for link hover
			},
			fontFamily: {
				'sans': ['Open Sans', 'sans-serif'],
				'mono': ['Roboto Mono', 'monospace'],
			},
		},
	},
	plugins: [],
};
