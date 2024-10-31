@extends('layouts.auth')

@section('auth')
    <!-- Toast -->
    <div id="dismiss-toast" class="absolute end-5 top-5">
        <div class="max-w-xs rounded-xl bg-red-500 text-sm text-white shadow-lg" role="alert" tabindex="-1"
            aria-labelledby="hs-toast-solid-color-red-label">
            <div id="hs-toast-solid-color-red-label" class="text-nowrap flex p-4">
                Hmm, kode QR-nya tidak terdaftar. <br>Cek lagi ya!
                <div class="ms-auto ps-2">
                    <button data-hs-remove-element="#dismiss-toast" type="button"
                        class="size-5 inline-flex shrink-0 items-center justify-center rounded-lg text-white opacity-50 hover:text-white hover:opacity-100 focus:opacity-100 focus:outline-none"
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
    </div>
    <!-- End Toast -->
    <div id="qr-modal"
        class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden"
        role="dialog" tabindex="-1" aria-labelledby="qr-modal-label">
        <div
            class="m-3 mt-0 flex min-h-[calc(100%-3.5rem)] items-center opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70 pointer-events-auto flex w-full flex-col rounded-xl border bg-white shadow-sm">
                <div class="dark:border-neutral-700 flex items-center justify-between border-b px-4 py-3">
                    <h3 id="qr-modal-label" class="dark:text-white font-bold text-gray-800">
                        Scan QRId
                    </h3>
                    <button type="button" onclick="endQr()"
                        class="size-8 dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600 inline-flex items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
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
                <div class="overflow-y-auto p-4">
                    <div id="reader" class="aspect-square h-auto w-full"></div>
                </div>
                <div class="dark:border-neutral-700 hidden items-center justify-end gap-x-2 border-t px-4 py-3">
                    <button type="button" onclick="endQr()" data-hs-overlay="#qr-modal"
                        class="dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 shadow-sm hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                        Close
                    </button>
                    <button type="button"
                        class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex min-h-screen flex-col items-center justify-center">
        <img class="mx-auto mb-4 w-1/2 md:w-1/4" src="{{ asset('assets/logo.png') }}" alt="logo pkids">
        <form class="mx-auto w-full max-w-sm px-10">
            @csrf
            <!-- Form Group -->
            <div class="max-w-sm">
                <label for="input-label" class="dark:text-white mb-2 block text-sm font-medium">QRId</label>
                <input name="qrid" type="text" id="input-label"
                    class="dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded-lg border-gray-200 px-4 py-3 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                    placeholder="Masukan QRId">
            </div>
            <div class="mt-2 max-w-sm">
                <label class="dark:text-white mb-2 block text-sm">Password</label>
                <div class="relative">
                    <input name="password" id="hs-toggle-password" type="password"
                        class="dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 block w-full rounded-lg border-gray-200 py-3 pe-10 ps-4 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
                        placeholder="Masukan Password">
                    <button type="button" data-hs-toggle-password='{
          "target": "#hs-toggle-password"
        }'
                        class="dark:text-neutral-600 dark:focus:text-blue-500 absolute inset-y-0 end-0 z-20 flex cursor-pointer items-center rounded-e-md px-3 text-gray-400 focus:text-blue-600 focus:outline-none">
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
                    class="inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-4 py-3 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Masuk
                </button>

                <p>atau</p>

                <button type="button" onclick="showModalQr()"
                    class="dark:text-blue-400 dark:hover:bg-blue-900 dark:focus:bg-blue-900 inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-100 px-4 py-3 text-sm font-medium text-blue-800 hover:bg-blue-200 focus:bg-blue-200 focus:outline-none disabled:pointer-events-none disabled:opacity-50">
                    Scan QRId
                </button>
            </div>
        </form>

        <!-- GPDI logo with text -->
        <div class="mt-6 flex items-center justify-center"> <!-- Flex to align image and text -->
            <img class="w-1/12" src="{{ asset('assets/gpdi_logo.png') }}" alt="logo gpdi">
            <span class="ml-2 text-sm text-gray-500">by GPdI Mahanaim Tegal</span>
        </div>
    </div>
@endsection
