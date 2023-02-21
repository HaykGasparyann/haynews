@extends('links')

<div class="mb-3">
    <div class="container">
        <div class="row section-title">
            <div class="col-8">
                <div class=" mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Make a News</h4>
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
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($users as $user)
                                        @if($user->id!=auth()->id())
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="text-sm font-medium text-gray-900">
                                                       <p>{{ $user->name }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="/admin/news/{{ $user->id }}/edit-user" class="text-blue-500 hover:text-blue-600">Edit</a>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <form method="POST" action="/admin/news/users/{{$user->id }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="text-gray-400">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
