<div class="p-4">
  <button wire:click="isOpenModal"
    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded mb-4">Tambah Post</button>

  @if(session()->has('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">{{ session('success') }}
  </div>
  @endif

  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 text-left">Judul</th>
          <th class="px-4 py-2 text-left">Slug</th>
          <th class="px-4 py-2 text-left">Kategori</th>
          <th class="px-4 py-2 text-left">Tags</th>
          <th class="px-4 py-2 text-left">Cover</th>
          <th class="px-4 py-2 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $post->title }}</td>
          <td class="px-4 py-2">{{ $post->slug }}</td>
          <td class="px-4 py-2">{{ $post->kategori ? $post->kategori->nama_kategori : '-' }}</td>
          <td class="px-4 py-2">
            @foreach($post->tags as $tag)
            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mr-1 mb-1">{{ $tag->name
              }}</span>
            @endforeach
          </td>
          <td class="px-4 py-2">
            @if($post->cover_image)
            <img src="{{ asset('storage/' . $post->cover_image) }}" class="w-20 h-14 object-cover rounded" />
            @endif
          </td>
          <td class="px-4 py-2">
            <button wire:click="openEditModal({{ $post->id }})"
              class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded mr-2">Edit</button>
            <button wire:click="delete({{ $post->id }})"
              class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded"
              onclick="return confirm('Yakin hapus?')">Hapus</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if($isModalOpen)
  <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg shadow-lg relative">
      <button type="button" class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"
        wire:click="$set('isModalOpen', false)">&times;</button>
      <h2 class="text-xl font-bold mb-4">{{ $postId ? 'Edit Post' : 'Tambah Post' }}</h2>
      <form wire:submit.prevent="{{ $postId ? 'update' : 'store' }}">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Column 1: title, kategori, cover input -->
          <div>
            <label class="block mb-1 font-medium">Judul</label>
            <input type="text"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
              wire:model.defer="title">
            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>
          <div>
            <label class="block mb-1 font-medium">Kategori</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" wire:model.defer="kategori_id">
              <option value="">- Pilih Kategori -</option>
              @foreach(App\Models\Kategori::all() as $kategori)
              <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori ?? $kategori->nama }}</option>
              @endforeach
            </select>
            @error('kategori_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>

          <div>
            <label class="block mb-1 font-medium">Jenis Halaman</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2" wire:model.defer="jenis_halaman">
              <option value="">--Pilih Jenis Halaman--</option>
              <option value="artikel">artikel</option>
              <option value="berita">berita</option>
              <option value="slider">slider</option>

            </select>
            @error('jenis_halaman') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          </div>
          <div class="flex items-center">
            <input type="checkbox" wire:model="is_published" class="mr-2 p-4">
            <span>Publish?</span>
          </div>

        </div>
        <!-- Content spans both columns -->
        <div class="md:col-span-2">
          <label class="block mb-1 font-medium">Content</label>
          <textarea
            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-400"
            wire:model.defer="content" rows="4"></textarea>
        </div>

        <!-- Cover image input and preview -->
        <div class="">
          <label class="block mb-1 font-medium">Cover Image</label>
          <input type="file" class="w-full border border-gray-300 rounded px-3 py-2" wire:model="cover_image">
          @error('cover_image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
          @if($cover_image)
          <img src=" {{ $cover_image->temporaryUrl() }}" class="mt-2 w-10 rounded">
          @elseif($postId && $cover = \App\Models\Post::find($postId)?->cover_image)
          <img src="{{ asset('storage/'.$cover) }}" class="mt-2 w-10 rounded border border-gray-400">
          @endif
        </div>

        <div class="md:col-span-2">
          <div>
            <label for="">Tags</label>
          </div>
          @foreach(App\Models\Tag::all() as $tag)
          <input id="coba-select" type="checkbox" value="{{ $tag->id }}" wire:model.live="tags"
            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 items-center">
          <label class=" ml-1 text-sm text-gray-700 items-center  mr-3 mt-[-2]">{{$tag->name ?? $tag->name}}</label>
          @endforeach

          @error('tags') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end gap-2 mt-6">
          <button type="button" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded"
            wire:click="$set('isModalOpen', false)">Batal</button>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">{{ $postId ?
            'Update'
            : 'Simpan' }}</button>
        </div>
      </form>
    </div>
  </div>
  @endif
</div>