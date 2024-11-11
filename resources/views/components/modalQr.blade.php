<!-- ModalQr -->

<div id="qr-modal"
    class="hs-overlay size-full pointer-events-none fixed start-0 top-0 z-[80] hidden overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
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
<!-- End ModalQr -->
