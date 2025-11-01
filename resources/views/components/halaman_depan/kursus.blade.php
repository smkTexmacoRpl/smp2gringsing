<section id="berita" class="py-20 bg-white dark:bg-gray-800">
  <div class="container mx-auto px-6">
    <div class="text-center mb-12">
      <h2 class="text-3xl md:text-4xl font-bold">Berita Terbaru</h2>
      <p class="mt-4 max-w-2xl mx-auto text-gray-600 dark:text-gray-400">

      </p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Course Card 1 -->
      @foreach (\App\Models\Post::latest()->take(4)->get() as $post)
      <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg shadow-md overflow-hidden group hover:shadow-2xl">
        @if($post->cover_image)
        <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}"
          class="w-full h-40 object-cover duration-500 group-hover:scale-110" />
        @endif
        <div class="p-5">
          <h3 class="text-lg font-bold mb-2">{{ $post->title }}</h3>
          <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-3">
            <i data-lucide="clock" class="w-4 h-4 mr-2"></i> {{date_format($post->updated_at,"d-m-Y") }}
            <span class="mx-2">|</span>
            <i data-lucide="user" class="w-4 h-4 mr-2"></i> by Author
          </div>
          <p>{{substr($post->content,0,110)}} ...</p>
          <a href="{{ route('posts.show', $post->slug) }}"
            class="font-semibold text-sm text-primary-600 dark:text-primary-400 hover:underline hover:text-green-400">baca
            selengkapnya</a>
        </div>
      </div>
      @endforeach


    </div>
  </div>
</section>