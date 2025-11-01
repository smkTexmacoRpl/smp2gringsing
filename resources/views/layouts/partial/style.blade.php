{{-- <script src="https://cdn.tailwindcss.com"></script> --}}
<!-- Google Fonts: Inter -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<!-- Swiper.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('assets/css/depan.min.css') }}" />
<style>
	/* * {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		font-family: 'Poppins', sans-serif;
	} */

	/* --- SLIDER WRAPPER --- */
	.slider {
		position: relative;
		width: 100%;
		height: 90vh;
		overflow: hidden;
	}

	/* --- INDIVIDUAL SLIDE --- */
	.slide {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-size: cover;
		background-position: center;
		opacity: 0;
		animation: fade 15s infinite;
	}

	/* --- FADE ANIMATION --- */
	@keyframes fade {
		0% {
			opacity: 0;
		}

		5% {
			opacity: 1;
		}

		30% {
			opacity: 1;
		}

		35% {
			opacity: 0;
		}

		100% {
			opacity: 0;
		}
	}

	/* --- OVERLAY --- */
	.overlay {
		position: absolute;
		inset: 0;
		background: rgba(0, 0, 0, 0.5);
	}

	/* --- SLIDE CONTENT --- */
	.content {
		position: relative;
		z-index: 2;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: flex-start;
		padding: 0 10%;
		color: #fff;
		text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
	}

	.content h1 {
		font-size: 3rem;
		font-weight: 700;
	}

	.content p {
		margin-top: 15px;
		font-size: 1.25rem;
		max-width: 600px;
		line-height: 1.6;
	}

	/* --- RESPONSIVE --- */
	@media (max-width: 768px) {
		.content h1 {
			font-size: 2rem;
		}

		.content p {
			font-size: 1rem;
		}
	}

	@media (max-width: 480px) {
		.content {
			padding: 0 5%;
		}

		.content h1 {
			font-size: 1.6rem;
		}
	}
</style>

<script>
	// Konfigurasi Tailwind CSS untuk dark mode
tailwind.config = {
	darkMode: "class",
	theme: {
		extend: {
			colors: {
				primary: {
					50: "#effef7",
					100: "#d9fceb",
					200: "#baf8d9",
					300: "#8cf1c2",
					400: "#59e6a5",
					500: "#31d789",
					600: "#23b772",
					700: "#1e955e",
					800: "#1d764d",
					900: "#1a6041",
					950: "#0d3524",
				},
			},
		},
	},
};
</script>