<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
				// Inisialisasi Lucide Icons
				lucide.createIcons();

				// --- DARK MODE TOGGLE ---
				const themeToggleBtn = document.getElementById("theme-toggle");
				const htmlEl = document.documentElement;

				// Cek tema dari localStorage saat halaman dimuat
				if (
					localStorage.getItem("theme") === "dark" ||
					(!("theme" in localStorage) &&
						window.matchMedia("(prefers-color-scheme: dark)").matches)
				) {
					htmlEl.classList.add("dark");
				} else {
					htmlEl.classList.remove("dark");
				}

				themeToggleBtn.addEventListener("click", function () {
					htmlEl.classList.toggle("dark");
					// Simpan preferensi tema ke localStorage
					if (htmlEl.classList.contains("dark")) {
						localStorage.setItem("theme", "dark");
					} else {
						localStorage.setItem("theme", "light");
					}
				});

				// --- MOBILE MENU TOGGLE ---
				const mobileMenuButton = document.getElementById("mobile-menu-button");
				const mobileMenu = document.getElementById("mobile-menu");
				mobileMenuButton.addEventListener("click", () => {
					mobileMenu.classList.toggle("hidden");
				});

				// --- NAVBAR SCROLL EFFECT ---
				const header = document.getElementById("header");
				window.addEventListener("scroll", () => {
					if (window.scrollY > 50) {
						header.classList.add(
							"bg-white/80",
							"dark:bg-gray-900/80",
							"backdrop-blur-sm",
							"shadow-md"
						);
					} else {
						header.classList.remove(
							"bg-white/80",
							"dark:bg-gray-900/80",
							"backdrop-blur-sm",
							"shadow-md"
						);
					}
				});

				
				// --- FEEDBACK SLIDER (SWIPER) ---
				const swiper = new Swiper(".feedbackSwiper", {
					// Konfigurasi Swiper
					loop: true,
					spaceBetween: 30,
					// Responsif: 2 kolom di desktop, 1 di mobile
					slidesPerView: 1,
					breakpoints: {
						768: {
							slidesPerView: 2,
							spaceBetween: 30,
						},
					},
					// Tombol navigasi
					navigation: {
						nextEl: ".swiper-button-next",
						prevEl: ".swiper-button-prev",
					},
				});
			});
</script>