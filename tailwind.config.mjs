/** @type {import('tailwindcss').Config} */
export default {
	content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
	theme: {
		extend: {
			colors: {
				'cajogos-blue': '#00A2FF',
				'global-orangered': '#EB6864',
				'global-yellow': '#F8CC03',
			},
			fontFamily: {
				'sans': ['Open Sans', 'sans-serif'],
				'mono': ['Roboto Mono', 'monospace'],
			},
		},
	},
	plugins: [],
};
