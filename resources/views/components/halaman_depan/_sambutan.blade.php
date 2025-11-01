<section id="jurusan" class="py-20">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold">Visi & Misi</h2>
      <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-400">

      </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Card Jurusan 1 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden group">
        <img src="https://placehold.co/600x400/31d789/FFFFFF?text=Sambutan Kepala Sekolah" alt="Teknik Informatika"
          class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
        <div class="p-6">
          <h3 class="text-xl font-bold mb-2">{{ $prakata->judul }}</h3>
          <p class="text-gray-600 dark:text-gray-400 mb-4">
            {{ substr($prakata->isi, 0, 95) }}...
          </p>
          <a href="#"
            class="font-semibold text-primary-600 dark:text-primary-400 hover:underline hover:text-green-400">Lihat
            Detail
            &rarr;</a>
        </div>
      </div>
      <!-- Card Jurusan 2 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden group">
        <img src="https://placehold.co/600x400/31d789/FFFFFF?text= visi & misi" alt="Manajemen Bisnis"
          class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
        <div class="p-6">
          <h3 class="text-xl font-bold mb-2">{{ strtoupper('visi & misi') }}</h3>
          <p class="text-gray-600 dark:text-gray-400 mb-4">
            {{ substr($visi->visi,0,95)}}...
          </p>
          <a href="{{ route('visi-misi') }}"
            class="font-semibold text-primary-600 dark:text-primary-400 hover:underline hover:text-green-400">Lihat
            Detail
            &rarr;</a>
        </div>
      </div>
      <!-- Card Jurusan 3 -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden group">
        <img src="https://placehold.co/600x400/31d789/FFFFFF?text=Tujuan" alt="Desain Grafis"
          class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
        <div class="p-6">
          <h3 class="text-xl font-bold mb-2">SMP N2 Gringsing</h3>
          <p class="text-gray-600 dark:text-gray-400 mb-4">
            Mengasah kreativitas dalam desain grafis, animasi, dan produksi
            multimedia.
          </p>
          <a href="#"
            class="font-semibold text-primary-600 dark:text-primary-400 hover:underline hover:text-green-400">Lihat
            Detail
            &rarr;</a>
        </div>
      </div>
    </div>
  </div>
</section>