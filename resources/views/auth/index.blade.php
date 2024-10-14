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

    <div class="flex flex-col justify-center items-center min-h-screen">
        <img class="w-1/2 md:w-1/4 mx-auto mb-6" src="{{ asset('assets/logo.png') }}" alt="logo pkids">

        <form class="w-full max-w-sm mx-auto px-10"> <!-- Max width and centering form -->
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
                    onclick="showModal()"
                    type="primary"
                    class="my-3">
                    Scan QR
                </x-bladewind.button>
            </div>
        </form>

        <!-- GPdI logo with text -->
        <div class="flex items-center justify-center mt-6"> <!-- Flex to align image and text -->
            <img class="w-1/12" src="{{ asset('assets/gpdi_logo.png') }}" alt="logo gpdi">
            <span class="ml-2 text-gray-500 text-sm">by GPdI Mahanaim Tegal</span>
        </div>
    </div>
@endsection

<script>
    document.getElementById("openCameraBtn").addEventListener("click", function () {
        navigator.mediaDevices.enumerateDevices().then((devices) => {
            const videoDevices = devices.filter((device) => device.kind === "videoinput");
            const cameraSelect = document.getElementById("cameraSelect");

            // Clear any previous options
            cameraSelect.innerHTML = "";

            // Populate the camera dropdown
            videoDevices.forEach((device, index) => {
                const option = document.createElement("option");
                option.value = device.deviceId;
                option.text = device.label || `Camera ${index + 1}`;
                cameraSelect.appendChild(option);
            });

            // Default to the first camera
            cameraSelect.selectedIndex = 0;

            // Show modal
            document.getElementById("readerModal").classList.add("flex");
            document.getElementById("readerModal").classList.remove("hidden");

            let html5QrCode = new Html5Qrcode("reader");

            // Function to start scanning
            function startScanning(cameraId) {
                html5QrCode
                    .start(
                        cameraId,
                        {
                            fps: 10,
                            qrbox: 250,
                        },
                        (decodedText, decodedResult) => {
                            console.log(`Scan result: ${decodedText}`, decodedResult);

                            const qrData = JSON.parse(decodedText);

                            if (qrData.code_unique) {
                                document.getElementById("codeUnique").value = qrData.code_unique;
                                document.getElementById("guruId").value = qrData.guru_id;
                                document.getElementById("absenForm").submit();
                            } else {
                                document.getElementById("nik_siswa").value = decodedText;
                                document.getElementById("absenForm").submit();
                            }

                            html5QrCode.stop();
                            document.getElementById("readerModal").classList.add("hidden");
                            document.getElementById("readerModal").classList.remove("flex");
                        },
                        (errorMessage) => {
                            // console.error(`QR Code scan error: ${errorMessage}`);
                        }
                    )
                    .catch((err) => {
                        console.error(`Unable to start scanning: ${err}`);
                    });
            }

            // Start scanning when the button is clicked
            document.getElementById("startScanningBtn").addEventListener("click", function () {
                startScanning(cameraSelect.value);
            });

            // Listen for camera selection change
            cameraSelect.addEventListener("change", function () {
                html5QrCode.stop().then(() => {
                    startScanning(cameraSelect.value);
                });
            });

            // Close the modal and stop the camera when "Close" is clicked
            document.getElementById("closeReader").addEventListener("click", function () {
                html5QrCode.stop().then(() => {
                    document.getElementById("readerModal").classList.add("hidden");
                    document.getElementById("readerModal").classList.remove("flex");
                });
            });
        }).catch(function (err) {
            alert("Unable to access the camera devices. Camera access is required to scan the QR code.");
        });
    });
</script>
