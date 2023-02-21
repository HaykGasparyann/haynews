@extends('links')
<style>
.switch {
position: relative;
display: inline-block;
width: 60px;
height: 34px;
}

.switch input {
opacity: 0;
width: 0;
height: 0;
}

.slider {
position: absolute;
cursor: pointer;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-color: #ccc;
-webkit-transition: .4s;
transition: .4s;
}

.slider:before {
position: absolute;
content: "";
height: 26px;
width: 26px;
left: 4px;
bottom: 4px;
background-color: white;
-webkit-transition: .4s;
transition: .4s;
}

input:checked + .slider {
background-color: #2196F3;
}

input:focus + .slider {
box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
-webkit-transform: translateX(26px);
-ms-transform: translateX(26px);
transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
border-radius: 34px;
}

.slider.round:before {
border-radius: 50%;
}
</style>

<div class="mb-3">
    <div class="container">
        <div class="row section-title">
            <div class="col-8">
                <div class=" mb-0">
                    <h4 class="m-0 text-uppercase font-weight-bold">Edit Permission for the User :  <?= $user->name ?></h4>
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
                <form method="POST" action="/admin/news/{{ $user->id }}/edit-user"  >
                    @csrf
                    @method('PATCH')
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="name"
                        >
                            Name
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="<?=old('name',$user->name)?>"
                               required
                        >

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="admin"
                        >
                            Admin
                        </label>
                        <select name="admin" id="admin">
                                <option
                                    value="1"
                                    <?php if($user->admin == '1' ) {echo 'selected';} else{echo '';} ?>
                                >Yes</option>
                            <option
                                value="0"
                                    <?php if($user->admin == '0' ) {echo 'selected';} else{echo '';} ?>
                            >No</option>
                        </select>

                    </div>
                    @if(!$user->admin)
                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="writer"
                        >
                            Writer
                        </label>

                            <select name="writer" id="writer">
                                <option
                                    value="1"
                                        <?php if($user->writer == '1' ) {echo 'selected';} else{echo '';} ?>
                                >Yes</option>
                                <option
                                    value="0"
                                        <?php if($user->writer == '0' ) {echo 'selected';} else{echo '';} ?>
                                >No</option>
                            </select>

                        </label>

                    </div>
                    @endif






                    <x-submit-button>Update</x-submit-button>
                </form>
            </div>
        </div>
    </div>

</div>


