<div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Blog Management</h2>
            <button wire:click="create" class="px-4 py-2 bg-blue-600 text-white rounded-lg">+ Add Blog</button>
        </div>

        @if (session()->has('message'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ session('message') }}
        </div>
        @endif

        <table class="w-full border-collapse bg-white shadow rounded-lg">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-2">Title</th>
                    <th class="p-2">Published</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                <tr class="border-t">
                    <td class="p-2">{{ $blog->title }}</td>
                    <td class="p-2">
                        @if($blog->is_published)
                        <span class="text-green-600 font-medium">Yes</span>
                        @else
                        <span class="text-gray-500">No</span>
                        @endif
                    </td>
                    <td class="p-2 space-x-2">
                        <button wire:click="edit({{ $blog->id }})"
                            class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</button>
                        <button wire:click="delete({{ $blog->id }})"
                            class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-2 text-center text-gray-500">No blogs found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Modal -->
        <div x-data="{ open: @entangle('showModal') }">
            {{-- <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white w-full max-w-lg rounded-lg p-6 shadow-lg">
                    <h2 class="text-lg font-bold mb-4">{{ $blogId ? 'Edit Blog' : 'Create Blog' }}</h2>

                    <form wire:submit.prevent="save" class="space-y-4">
                        <div>
                            <label class="block font-medium">Title</label>
                            <input type="text" wire:model="title" class="w-full border rounded p-2">
                            @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block mb-1 font-medium">Kategori</label>
                            <select class="w-full border border-gray-300 rounded px-3 py-2"
                                wire:model.defer="kategori_id">
                                <option value="">- Pilih Kategori -</option>
                                @foreach(App\Models\Kategori::all() as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori ?? $kategori->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Content</label>
                            <textarea wire:model="content" class="w-full border rounded p-2"></textarea>
                            @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block font-medium">Cover Image</label>
                            <input type="file" wire:model="cover_image">
                            @if($cover_image)
                            <img src="{{ $cover_image->temporaryUrl() }}" class="mt-2 w-32 rounded">
                            @endif
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" wire:model="is_published" class="mr-2">
                            <span>Publish?</span>
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div> --}}

            <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white w-full max-w-2xl rounded-lg p-6 shadow-lg">
                    <h2 class="text-lg font-bold mb-4">{{ $blogId ? 'Edit Blog' : 'Create Blog' }}</h2>

                    <form wire:submit.prevent="save" class="grid grid-cols-2 gap-4">
                        <!-- Left Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block font-medium">Title</label>
                                <input type="text" wire:model="title"
                                    class="w-full  border border-gray-400  rounded p-2">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-medium">Kategori</label>
                                <select type="text" wire:model="slug" readonly
                                    class="w-full border border-gray-300 rounded p-2 bg-gray-100">
                                    <option value="" disabled>--pilih kategori--</option>
                                    @foreach(App\Models\Kategori::all() as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori ?? $kategori->nama
                                        }}</option>
                                    @endforeach
                                </select>
                                @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-medium">Cover Image</label>
                                <input type="file" wire:model="cover_image" class="w-full file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                        file:bg-blue-200 file:text-blue-600
                                        hover:file:bg-blue-300">
                                @if($cover_image)
                                <img src=" {{ $cover_image->temporaryUrl() }}" class="mt-2 w-35 rounded">
                                @elseif($blogId && $cover = \App\Models\Blog::find($blogId)?->cover_image)
                                <img src="{{ asset('storage/'.$cover) }}"
                                    class="mt-2 w-32 rounded border border-gray-400">
                                @endif
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" wire:model="is_published" class="mr-2 p-4">
                                <span>Publish?</span>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-4">
                            <div>
                                <label class="block font-medium">Content</label>
                                <textarea wire:model="content" rows="5"
                                    class="w-full border  border-gray-400 rounded p-2"></textarea>
                                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block font-medium">tags</label>
                                <select class="w-full border border-gray-300 rounded px-3 py-2" wire:model.defer="tags"
                                    multiple>
                                    @foreach(App\Models\Tag::all() as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name ?? $tag->nama }}</option>
                                    @endforeach
                                </select>
                                @error('tags') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Full Width: Action Buttons -->
                        <div class="col-span-2 flex justify-end space-x-2 pt-4">
                            <button type="button" @click="open = false"
                                class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>