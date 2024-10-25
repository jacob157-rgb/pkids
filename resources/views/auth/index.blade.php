@extends('layouts.auth')

@section('auth')
    <x-bladewind.notification />

    <x-bladewind::modal
        title="ScanQR"
        blur_size="small"
        name="modalQR"
        align_buttons="center"
        show_action_buttons="false">
    </x-bladewind::modal>

    <div class="flex flex-col items-center justify-center min-h-screen">
        <img class="w-1/2 mx-auto mb-6 md:w-1/4" src="{{ asset('assets/logo.png') }}" alt="logo pkids">

        <form class="w-full max-w-sm px-10 mx-auto"> <!-- Max width and centering form -->
            @csrf

            <x-bladewind::input
                prefix="user"
                prefix_is_icon="true"
                prefix_icon_css="text-sky-500"
                name="qrid"
                required="true"
                label="QRID"
                error_message="Eitss! Isi dulu qrid nya yaaa." />

            <x-bladewind::input
                prefix="key"
                prefix_is_icon="true"
                prefix_icon_css="text-orange-500"
                required="true"
                label="Password"
                type="password"
                viewable="true"
                suffix="eye" />

            <div class="text-center">
                <x-bladewind.button
                    name="btn-save"
                    has_spinner="true"
                    type="primary"
                    can_submit="true"
                    class="my-3">
                    Masuk
                </x-bladewind.button>

                <p>atau</p>

                <x-bladewind.button
                    name="btn-save"
                    onclick="showModal('modalQR')"
                    type="primary"
                    class="my-3">
                    Scan QR
                </x-bladewind.button>
            </div>
        </form>

        <!-- GPdI logo with text -->
        <div class="flex items-center justify-center mt-6"> <!-- Flex to align image and text -->
            <img class="w-1/12" src="{{ asset('assets/gpdi_logo.png') }}" alt="logo gpdi">
            <span class="ml-2 text-sm text-gray-500">by GPdI Mahanaim Tegal</span>
        </div>
    </div>
@endsection


