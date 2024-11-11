<!-- Toast -->
@props(['message', 'id', 'type'])

@php
    $bgColor = $type === 'success' ? 'bg-teal-500' : 'bg-red-500';
@endphp

<div id="dismiss-toast-{{ $i }}"
    class="{{ $bgColor }} my-2 max-w-xs rounded-xl text-sm text-white shadow-lg" role="alert" tabindex="-1"
    aria-labelledby="hs-toast-solid-color-red-label">
    <div id="hs-toast-solid-color-red-label" class="flex p-4 text-nowrap">
        {{ $message }}
        <div class="ms-auto ps-2">
            <button data-hs-remove-element="#dismiss-toast-{{ $i }}" type="button"
                class="inline-flex items-center justify-center text-white rounded-lg opacity-50 size-5 shrink-0 hover:text-white hover:opacity-100 focus:opacity-100 focus:outline-none"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>    
                </svg>
            </button>
        </div>
    </div>
</div>
<!-- End Toast -->
