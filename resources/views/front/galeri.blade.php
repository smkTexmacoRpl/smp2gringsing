@extends('layouts.depan')
@section('content')
<section class="py-16 bg-white dark:bg-gray-800">
	<div class="container mx-auto px-6 min-h-screen py-12" x-data="galleryApp()">

		<div class="max-w-6xl mx-auto text-center mb-10">
			<h1 class="text-4xl font-bold mb-4 text-gray-800">📸 Galeri Sekolah</h1>
			<div class="space-x-3">
				<button @click="filter='all'" :class="buttonClass('all')">Semua</button>
				@foreach ($galeris as $item)
				<button @click="filter='{{ $item->kategori_id }}'" :class="buttonClass('{{ $item->kategori_id }}')">
					{{ $item->kategori->nama_kategori }}
				</button>
				@endforeach
				{{-- <button @click="filter='kegiatan'" :class="buttonClass('kegiatan')">
					Kegiatan
				</button>
				<button @click="filter='prestasi'" :class="buttonClass('prestasi')">
					Prestasi
				</button>
				<button @click="filter='kelas'" :class="buttonClass('kelas')">Kelas</button> --}}
			</div>
		</div>

		<!-- Gallery Grid -->
		<div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
			<template x-for="(img, index) in filteredImages" :key="index">
				<div class="relative group cursor-pointer" @click="openLightbox(index)">
					<img :src="img.src" :alt="img.category"
						class="w-full h-64 object-cover rounded-xl shadow-md group-hover:opacity-75 transition" />
					<div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-xl transition">
					</div>
					<p class="absolute bottom-2 left-2 text-white text-sm font-medium bg-black/40 px-2 py-1 rounded-md"
						x-text="img.category.toUpperCase()"></p>
				</div>
			</template>
		</div>

		<!-- Lightbox -->
		<template x-if="lightbox.open">
			<div class="fixed inset-0 bg-black/80 flex items-center justify-center z-50" @click.self="closeLightbox()"
				x-transition.opacity.duration.300ms>
				<div class="relative max-w-4xl w-full flex items-center justify-center px-4">
					<!-- Tombol Prev -->
					<button @click.stop="prevImage()"
						class="absolute left-4 text-white text-3xl hover:scale-110 transition select-none">
						&#10094;
					</button>

					<!-- Gambar dengan animasi fade -->
					<template x-if="currentImage">
						<img :src="currentImage.src"
							class="max-h-[80vh] rounded-xl shadow-lg transition-opacity duration-500"
							:class="{'opacity-0': fading, 'opacity-100': !fading}" @load="fading = false" alt="" />
					</template>

					<!-- Tombol Next -->
					<button @click.stop="nextImage()"
						class="absolute right-4 text-white text-3xl hover:scale-110 transition select-none">
						&#10095;
					</button>

					<!-- Tombol Close -->
					<button @click="closeLightbox()"
						class="absolute top-4 right-4 text-white text-2xl hover:scale-110 transition">
						✕
					</button>
				</div>
			</div>
		</template>

		<script>
			function galleryApp() 
				return {
					filter: "all",
					images: @json($galeri),
						return {
					

					get filteredImages() {
						return this.filter === "all"
							? this.images
							: this.images.filter(i => i.category === this.filter);
					},

					buttonClass(cat) {
						return `px-4 py-2 rounded-full text-sm font-medium border transition 
            ${
													this.filter === cat
														? "bg-blue-600 text-white border-blue-600"
														: "border-gray-400 text-gray-600 hover:bg-blue-50"
												}`;
					},

					// Lightbox
					lightbox: { open: false, index: 0 },
					fading: false,

					get currentImage() {
						return this.filteredImages[this.lightbox.index] || {};
					},

					openLightbox(index) {
						this.lightbox.open = true;
						this.lightbox.index = index;
						this.fading = false;
					},
					closeLightbox() {
						this.lightbox.open = false;
					},

					nextImage() {
						this.fading = true;
						setTimeout(() => {
							this.lightbox.index =
								(this.lightbox.index + 1) % this.filteredImages.length;
						}, 250);
					},
					prevImage() {
						this.fading = true;
						setTimeout(() => {
							this.lightbox.index =
								(this.lightbox.index - 1 + this.filteredImages.length) %
								this.filteredImages.length;
						}, 250);
					},
				};
			}
		</script>


	</div>
</section>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush