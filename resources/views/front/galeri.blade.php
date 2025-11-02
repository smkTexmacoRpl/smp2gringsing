@extends('layouts.depan')
@section('title', 'Galeri Sekolah')

@section('content')
<div class="text-center mt-[5%]">
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
	@endpush