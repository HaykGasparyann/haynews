@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-yellow-500 text-black py-1 px-4 rounded-xl bottom-5 right-20 text-sm"
         style="z-index: 101"
    >
        <p>{{ session('success') }}</p>
    </div>
@endif
