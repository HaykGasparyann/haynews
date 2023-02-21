@extends('links')

<div class="mb-3">
    <div class="container">
        <div class="row section-title">
            <div class="col-8">
                <div class=" mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Edit Post: <?= $news->title ?></h4>
                </div>
            </div>
            <div class="col-2 ">
                <form method="POST" action="/logout" class="text-xs font-semibold text-yellow-500 ml-2 mt-2 ">
                    @csrf

                    <x-submit-button>Log out</x-submit-button>

                </form>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-3 bg-white pl-5">
                <h4 class="font-semibold mt-4 mb-4">Links</h4>

                <ul>
                    <li>
                        <a href="/admin/news/index" class="{{ request()->is('admin/news/index') ? 'text-blue-500' : '' }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="/admin/news/create" class="{{ request()->is('admin/news/create') ? 'text-blue-500' : '' }}">New Post</a>
                    </li>
                    @admin
                    <li>
                        <a href="/admin/news/users" class="{{ request()->is('/admin/news/users') ? 'text-blue-500' : '' }}">Change Permissions </a>
                    </li>
                    @endadmin
                    <li>
                        <a href="/" class="">Back to Home</a>
                    </li>
                </ul>
            </div>
            <div class="col-9 bg-white border border-top-0 p-4">
                <form method="POST" action="/admin/news/{{ $news->id }}/edit"  enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <span>Name: </span><label class="font-weight-bold " for="name">{{ auth()->user()->name }}</label>

                            </div>
                        </div>

                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="title"
                        >
                            Title
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="title"
                               id="title"
                                value="<?=old('title',$news->title)?>"
                               required
                        >

                        @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="slug"
                        >
                            Slug
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="slug"
                               id="slug"
                               value="<?=old('slug',$news->slug)?>"
                               required
                        >

                        @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="abbr"
                        >
                            Excerpt
                        </label>

                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="abbr"
                                  id="abbr"
                                  required
                        ><?=old('abbr',$news->abbr)?></textarea>

                        @error('abbr')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="body"
                        >
                            Body
                        </label>

                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="body"
                                  id="body"
                                  required
                        ><?=old('body',$news->body)?></textarea>

                        @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="category_id"
                        >
                            Category
                        </label>

                        <select name="category_id" id="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id',$news->category_id) == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>

                        @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-6 flex">
                        <div class="flex-1">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="thumbnail"
                        >
                            Thumbnail
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="file"
                               name="thumbnail"
                               id="thumbnail"

                               value="<?=old('thumbnail',$news->thumbnail)?>"
                        >
                            @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>

                        <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">



                    </div>

                    <x-submit-button>Update</x-submit-button>
                </form>
            </div>
        </div>
    </div>

</div>

