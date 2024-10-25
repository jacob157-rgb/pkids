@extends('layouts.auth')

@section('auth')
    <div id="qr-modal"
        class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden"
        role="dialog" tabindex="-1" aria-labelledby="qr-modal-label">
        <div
            class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col w-full bg-white border shadow-sm pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 rounded-xl">
                <div class="flex items-center justify-between px-4 py-3 border-b dark:border-neutral-700">
                    <h3 id="qr-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Scan QRId
                    </h3>
                    <button type="button" onclick="endQr()"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full size-8 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
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
                <div class="p-4 overflow-y-auto">
                    <div id="reader" class="w-full h-auto aspect-square"></div>
                </div>
                <div class="items-center justify-end hidden px-4 py-3 border-t  dark:border-neutral-700 gap-x-2">
                    <button type="button" onclick="endQr()" data-hs-overlay="#qr-modal"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 gap-x-2 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                        Close
                    </button>
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col items-center justify-center min-h-screen">
        <img class="w-1/2 mx-auto mb-4 md:w-1/4" src="{{ asset('assets/logo.png') }}" alt="logo pkids">
        <form class="w-full max-w-sm px-10 mx-auto">
            @csrf
            <!-- Form Group -->
            <div class="max-w-sm">
                <label for="input-label" class="block mb-2 text-sm font-medium dark:text-white">QRId</label>
                <input type="email" id="input-label"
                    class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                    placeholder="Masukan QRId">
            </div>
            <div class="max-w-sm mt-2">
                <label class="block mb-2 text-sm dark:text-white">Password</label>
                <div class="relative">
                    <input id="hs-toggle-password" type="password"
                        class="block w-full py-3 text-sm border-gray-200 rounded-lg dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Masukan Password">
                    <button type="button" data-hs-toggle-password='{
          "target": "#hs-toggle-password"
        }'
                        class="absolute inset-y-0 z-20 flex items-center px-3 text-gray-400 cursor-pointer dark:text-neutral-600 dark:focus:text-blue-500 end-0 rounded-e-md focus:text-blue-600 focus:outline-none">
                        <svg class="size-3.5 shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                            <path class="hs-password-active:hidden"
                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                            <path class="hs-password-active:hidden"
                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                            <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                                y2="22"></line>
                            <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                            </path>
                            <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- End Form Group -->

            <div class="mt-4 space-y-2 text-center">
                <button type="button"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg gap-x-2 hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Masuk
                </button>

                <p>atau</p>

                <button type="button" onclick="showModalQr()"
                    class="inline-flex items-center px-4 py-3 text-sm font-medium text-blue-800 bg-blue-100 border border-transparent rounded-lg dark:text-blue-400 dark:hover:bg-blue-900 dark:focus:bg-blue-900 gap-x-2 hover:bg-blue-200 focus:bg-blue-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Scan QRId
                </button>
            </div>
        </form>

        <!-- GPDI logo with text -->
        <div class="flex items-center justify-center mt-6"> <!-- Flex to align image and text -->
            <img class="w-1/12" src="{{ asset('assets/gpdi_logo.png') }}" alt="logo gpdi">
            <span class="ml-2 text-sm text-gray-500">by GPdI Mahanaim Tegal</span>
        </div>
    </div>
@endsection
