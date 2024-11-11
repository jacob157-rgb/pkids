@extends('layouts.kids')

@section('kids')
    <header class="relative flex flex-wrap w-full py-3 text-sm bg-white dark:bg-neutral-800 sm:flex-nowrap sm:justify-start">
        <nav class="mx-auto w-full max-w-[85rem] px-4 sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center justify-between">
                <a class="flex-none text-xl font-semibold dark:text-white focus:opacity-80 focus:outline-none" href="#"
                    aria-label="Brand">
                    <img class="w-24 h-auto" src="{{ asset('assets/logo.png') }}" alt="Logo">
                </a>
                <div class="sm:hidden">
                    <button type="button"
                        class="relative flex items-center justify-center text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm hs-collapse-toggle size-7 dark:bg-transparent dark:border-neutral-700 dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10 gap-x-2 hover:bg-gray-50 focus:bg-gray-50 focus:outline-none disabled:pointer-events-none disabled:opacity-50"
                        id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example"
                        aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                        <svg class="size-4 shrink-0 hs-collapse-open:hidden" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="6" y2="6" />
                            <line x1="3" x2="21" y1="12" y2="12" />
                            <line x1="3" x2="21" y1="18" y2="18" />
                        </svg>
                        <svg class="hidden size-4 shrink-0 hs-collapse-open:block" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18" />
                            <path d="m6 6 12 12" />
                        </svg>
                        <span class="sr-only">Toggle navigation</span>
                    </button>
                </div>
            </div>
            <div id="hs-navbar-example"
                class="hidden overflow-hidden transition-all duration-300 hs-collapse grow basis-full sm:block"
                aria-labelledby="hs-navbar-example-collapse">
                <div class="flex flex-col gap-5 mt-5 sm:mt-0 sm:flex-row sm:items-center sm:justify-end sm:ps-5">
                    <a class="font-medium text-blue-500 dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600 hover:text-blue-600 focus:text-blue-600 focus:outline-none"
                        href="{{ route('kids.index') }}" aria-current="page">Beranda</a>
                    <a class="font-medium text-gray-600 dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500 hover:text-gray-400 focus:text-gray-400 focus:outline-none"
                        href="{{ route('kids.profile') }}">Pengaturan Profil</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="font-medium text-red-500 dark:text-red-500 dark:hover:text-red-600 dark:focus:text-red-600 hover:text-red-600 focus:text-red-600 focus:outline-none"
                            type="submit">Keluar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="flex items-center justify-center">
        <div class="flex flex-col items-center justify-center">
            <img class="inline-block rounded-lg shadow-lg size-2/6"
                src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80"
                alt="Avatar">
            <h1 class="px-10 mt-5 text-lg text-center dark:text-white">Halooo 👋 Kids, jumlah Poin kamu saat ini adalah...
            </h1>
            <div>
                <span
                    class="inline-flex items-center px-5 py-5 mt-5 text-5xl text-gray-800 bg-gray-100 rounded-full dark:bg-neutral-500/20 dark:text-neutral-400 gap-x-1">
                    45
                </span>
            </div>

            <div
                class="flex items-center py-5 text-sm text-gray-800 dark:text-white dark:before:border-neutral-600 dark:after:border-neutral-600 before:me-6 before:flex-1 before:border-t before:border-gray-200 after:ms-6 after:flex-1 after:border-t after:border-gray-200">
                <h1 class="px-10 text-lg text-center dark:text-white">Berikut sumber Poin kamu ya..
                </h1>
            </div>


            <div class="relative mx-10 overflow-x-auto overflow-y-auto shadow-md max-h-96 sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rounded-lg dark:text-gray-400 rtl:text-right">
                    <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400 bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Sumber Poin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Poin
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Stiker
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="border-b odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Top Up
                            </th>
                            <td class="px-6 py-4 text-center text-teal-500">
                                25
                            </td>
                            <td class="px-6 py-4 text-center">
                                -
                            </td>
                        </tr>
                        <tr
                            class="border-b odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Bazaar 2024
                            </th>
                            <td class="px-6 py-4 text-center text-red-500">
                                -5
                            </td>
                            <td class="px-6 py-4 text-center">
                                -
                            </td>
                        </tr>
                        <tr
                            class="border-b odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Magic Mouse 2
                            </th>
                            <td class="px-6 py-4 text-center text-teal-500">
                                15
                            </td>
                            <td class="px-6 py-4 text-center">
                                -
                            </td>
                        </tr>
                        <tr
                            class="border-b odd:dark:bg-gray-900 even:dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                Week 12
                            </th>
                            <td class="px-6 py-4 text-center text-teal-500">
                                10
                            </td>
                            <td class="px-6 py-4 text-center">
                                <img class="inline-block object-cover rounded-full size-8"
                                    src="https://www.shutterstock.com/image-vector/bartholomew-disciple-jesus-cartoon-vector-260nw-1965653113.jpg"
                                    alt="Avatar">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



        </div>
    </div>
@endsection
