@extends('layouts.depan')
@section('title', 'Galeri Sekolah')

@section('content')
{{-- <div class="text-center mt-[5%]">
	<div x-data="galleryFilter()" x-init="init()" class="container mx-auto px-6 py-12">
		<!-- FILTER BUTTONS -->
		<div class="flex flex-wrap justify-center gap-3 mb-8">
			<button class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700 transition"
				@click="setCategory('all')" :class="{'bg-blue-600': activeCategory === 'all'}">
				Semua
			</button>
			@foreach($kategories as $kategori)
			<button class="px-4 py-2 bg-green-800 text-white rounded-md hover:bg-green-600 transition"
				@click="setCategory({{ $kategori->id }})"
				:class="{'bg-green-600': activeCategory === {{ $kategori->id }}}">
				{{ $kategori->nama_kategori }}
			</button>
			@endforeach
		</div>

		<!-- GALLERY GRID -->
		<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
			@foreach($kategories as $kategori)
			@foreach($kategori->galeries as $gallery)
			@foreach($gallery->fotos as $foto)
			<div x-show="activeCategory === 'all' || activeCategory === {{ $kategori->id }}" x-transition
				class="relative overflow-hidden rounded-xl shadow-lg group">
				<!-- Skeleton shimmer -->
				<div x-show="!loadedImages.includes('{{ asset('storage/'.$foto) }}')"
					class="w-full h-64 bg-gray-300 animate-pulse rounded-lg"></div>

				<!-- Lazy-loaded image -->
				<img x-ref="img_{{ md5($foto) }}" data-src="{{ asset('storage/'.$foto) }}" alt="{{ $gallery->judul }}"
					class="w-full h-64 object-cover cursor-pointer group-hover:scale-105 transition duration-500 opacity-0"
					@click="openLightbox('{{ asset('storage/'.$foto) }}')"
					@load="onImageLoad('{{ asset('storage/'.$foto) }}', $el)">

				<div
					class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 flex items-center justify-center text-white transition">
					<span class="text-lg font-semibold">{{ $gallery->judul }}</span>
				</div>
			</div>
			@endforeach
			@endforeach
			@endforeach
		</div>

		<!-- LIGHTBOX -->
		<div x-show="lightboxOpen" x-transition.opacity.duration.300ms
			class="fixed inset-0 bg-black/90 flex items-center justify-center z-50">
			<button @click="prevImage" class="absolute left-6 text-white text-3xl">&#10094;</button>
			<img :src="currentImage" alt="Preview"
				class="max-h-[80vh] max-w-[90vw] rounded-xl shadow-lg transition-opacity duration-500"
				x-transition.opacity>
			<button @click="nextImage" class="absolute right-6 text-white text-3xl">&#10095;</button>
			<button @click="lightboxOpen = false"
				class="absolute top-6 right-6 text-white text-2xl hover:text-red-400 transition">
				&times;
			</button>
		</div>
	</div>

	<script>
		document.addEventListener('alpine:init', () => {
    Alpine.data('galleryFilter', () => ({
        activeCategory: 'all',
        lightboxOpen: false,
        currentImage: '',
        images: [],
        currentIndex: 0,
        loadedImages: [],

        init() {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        observer.unobserve(img);
                    }
                });
            }, { threshold: 0.1 });

            this.$nextTick(() => {
                const imgs = document.querySelectorAll('img[data-src]');
                imgs.forEach(img => observer.observe(img));
                this.images = [...imgs].map(img => img.dataset.src);
            });
        },

        setCategory(id) {
            this.activeCategory = id;
        },

        onImageLoad(src, el) {
            this.loadedImages.push(src);
            el.classList.remove('opacity-0');
            el.classList.add('opacity-100', 'transition-opacity', 'duration-700');
        },

        openLightbox(src) {
            this.currentImage = src;
            this.lightboxOpen = true;
            this.currentIndex = this.images.indexOf(src);
        },

        nextImage() {
            this.currentIndex = (this.currentIndex + 1) % this.images.length;
            this.fadeToImage(this.images[this.currentIndex]);
        },

        prevImage() {
            this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
            this.fadeToImage(this.images[this.currentIndex]);
        },

        fadeToImage(newSrc) {
            this.currentImage = '';
            setTimeout(() => { this.currentImage = newSrc }, 150);
        },
    }))
})
	</script>


	@push('scripts')
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
	</script>
	@endpush --}}
	<div class="mt-[10vh]">

		<div class="container mx-auto px-4 max-w-6xl">
			<h1 class="text-3xl font-bold mb-6 text-gray-800 text-center">Galeri Foto</h1>

			<!-- Filter Buttons -->
			<div class="flex flex-wrap gap-2 mb-6 justify-center">
				<button class="filter-btn px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 active"
					data-filter="*">
					Semua
				</button>
				@foreach($kategoris as $category)

				<button class="filter-btn px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
					data-filter=".cat-{{ $category->id }}">
					{{ $category->nama_kategori}}
				</button>
				@endforeach
			</div>

			<!-- Gallery Grid -->

			<div class="gallery-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

				@foreach($galeris as $gallery)

				<div class="gallery-item rounded-lg overflow-hidden shadow-lg bg-white cat-{{ $gallery->kategori_id }} flex flex-col cursor-pointer gallery-trigger"
					data-gallery-id="{{ $gallery->id }}">
					@if($gallery->fotos && count($gallery->fotos) > 0)
					@foreach ($gallery->fotos as $img)
					<img src="{{ asset('storage/'.$img) }}" alt="{{ $gallery->judul }}"
						class="w-full h-48 sm:h-56 md:h-48 object-cover">
					@break
					@endforeach
					@else
					<div class="w-full h-48 sm:h-56 md:h-48 bg-gray-300 flex items-center justify-center">
						<p class="text-gray-600 text-center">Gambar belum tersedia</p>
					</div>
					@endif
					<div class="p-4 flex-1 flex flex-col justify-between">
						<div>
							<h3 class="font-semibold text-lg text-center md:text-left">{{ $gallery->judul }}</h3>
							<p class="text-sm text-gray-600 text-center md:text-left">{{
								$gallery->kategori->nama_kategori
								}}
							</p>
							@if($gallery->deskripsi)
							<p class="mt-2 text-gray-700 text-center md:text-left">{{ Str::limit($gallery->deskripsi,
								60) }}
							</p>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>

			@if($galeris->isEmpty())
			<div class="flex justify-center mt-6">
				<p class="text-red-600 text-lg">Foto belum ada</p>
			</div>
			@endif

		</div>

		<!-- Lightbox Modal -->
		<div id="lightbox" class="hidden fixed inset-0 bg-black bg-opacity-75 items-center justify-center z-50">
			<div class="relative max-w-4xl w-full mx-4">
				<img id="lightbox-image" src="" alt="" class="w-full h-auto">
				<button id="lightbox-close"
					class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300">&times;</button>
				<button id="lightbox-prev"
					class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white text-3xl hover:text-gray-300">&#10094;</button>
				<button id="lightbox-next"
					class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white text-3xl hover:text-gray-300">&#10095;</button>
				<div id="lightbox-counter" class="text-white text-center mt-4">1 / 1</div>
			</div>
		</div>
	</div>

	@endsection

	@push('scripts')
	<script>
		const galleryData = {!! json_encode($galeris->map(fn($g) => ['id' => $g->id, 'fotos' => $g->fotos ?? [], 'judul' => $g->judul])->toArray()) !!};
	const assetStoragePath = '{{ url("storage") }}/';

	let currentGalleryId = null;
	let currentImageIndex = 0;
	let currentImages = [];

	document.addEventListener('DOMContentLoaded', function () {
		// Filter functionality
		const filterButtons = document.querySelectorAll('.filter-btn');
		const galleryItems = document.querySelectorAll('.gallery-item');

		filterButtons.forEach(button => {
			button.addEventListener('click', () => {
				filterButtons.forEach(btn => btn.classList.remove('active', 'bg-blue-600', 'text-white'));
				filterButtons.forEach(btn => btn.classList.add('bg-gray-200', 'text-gray-700'));
				button.classList.add('active', 'bg-blue-600', 'text-white');
				button.classList.remove('bg-gray-200', 'text-gray-700');

				const filterValue = button.getAttribute('data-filter');

				galleryItems.forEach(item => {
					if (filterValue === '*' || item.classList.contains(filterValue.replace('.', ''))) {
						item.style.display = 'block';
					} else {
						item.style.display = 'none';
					}
				});
			});
		});

		// Lightbox functionality
		const galleryTriggers = document.querySelectorAll('.gallery-trigger');
		const lightbox = document.getElementById('lightbox');
		const lightboxImage = document.getElementById('lightbox-image');
		const lightboxClose = document.getElementById('lightbox-close');
		const lightboxPrev = document.getElementById('lightbox-prev');
		const lightboxNext = document.getElementById('lightbox-next');

		galleryTriggers.forEach(trigger => {
			trigger.addEventListener('click', () => {
				currentGalleryId = trigger.getAttribute('data-gallery-id');
				const gallery = galleryData.find(g => g.id == currentGalleryId);
				
				if (gallery && gallery.fotos.length > 0) {
					currentImages = gallery.fotos.map(foto => assetStoragePath + foto);
					currentImageIndex = 0;
					updateLightbox();
					lightbox.classList.remove('hidden');
					lightbox.style.display = 'flex';
				}
			});
		});

		lightboxClose.addEventListener('click', () => {
			lightbox.classList.add('hidden');
			lightbox.style.display = 'none';
		});

		// Close when clicking on the backdrop (outside the image)
		lightbox.addEventListener('click', (e) => {
			if (e.target === lightbox) {
				lightbox.classList.add('hidden');
				lightbox.style.display = 'none';
			}
		});

		lightboxPrev.addEventListener('click', () => {
			currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
			updateLightbox();
		});
		lightboxNext.addEventListener('click', () => {
			currentImageIndex = (currentImageIndex + 1) % currentImages.length;
			updateLightbox();
		});

		// Keyboard navigation
		document.addEventListener('keydown', (e) => {
			if (lightbox.classList.contains('hidden')) return;
			if (e.key === 'ArrowLeft') lightboxPrev.click();
			if (e.key === 'ArrowRight') lightboxNext.click();
			if (e.key === 'Escape') lightboxClose.click();
		});

		function updateLightbox() {
			lightboxImage.src = currentImages[currentImageIndex];
			document.getElementById('lightbox-counter').textContent = `${currentImageIndex + 1} / ${currentImages.length}`;
		}
	});
	</script>
	@endpush