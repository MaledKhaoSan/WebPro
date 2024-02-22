<div x-data="{ showAlert: true }"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-2"
    x-show="showAlert" x-init="setTimeout(() => showAlert = false, 3000)"
    class="bg-white border-l-4 border-[#6E62E5] text-orange-700 p-4 flex flex-col gap-2 shadow-md"
    role="alert" data-title="{{ $title }}" data-message="{{ $message }}">
    <div class="flex flex-row gap-3 text-[#6E62E5]">
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <p>{{ $title }}</p>
    </div>
    <p class="text-gray-400">{{ $message }}</p>
</div>
