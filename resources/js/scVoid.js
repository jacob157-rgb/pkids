import { Html5Qrcode, Html5QrcodeSupportedFormats } from "html5-qrcode";
import { HSOverlay } from "preline";

let html5QrCode;

document.addEventListener("DOMContentLoaded", () => {
    window.endQr = function () {
        if (html5QrCode) {
            html5QrCode
                .stop()
                .then(() => {
                    HSOverlay.close("#qr-modal");
                })
                .catch((err) => {
                    console.error("Failed to stop QR Code scanner.", err);
                });
        } else {
            console.warn("QR Code scanner instance is not initialized.");
        }
    };

    window.showModalQr = function () {
        const config = {
            fps: 30,
            qrbox: { width: 250, height: 250 },
            aspectRatio: 1.0,
            rememberLastUsedCamera: true,
            formatsToSupport: [Html5QrcodeSupportedFormats.QR_CODE],
        };

        html5QrCode = new Html5Qrcode("reader");
        const qrSuccessCallback = (decodedText, decodedResult) => {
            console.log(decodedText);
            endQr();
        };

        html5QrCode
            .start({ facingMode: "environment" }, config, qrSuccessCallback)
            .catch((err) => {
                console.error("Unable to start the QR Code scanner.", err);
            });

        HSOverlay.open("#qr-modal");
    };
});
