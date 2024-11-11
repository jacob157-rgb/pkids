<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Open Graph  -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://pkids.gpdimahanaim-tegal.org//">
    <meta property="og:title" content="P-Kids">
    <meta property="og:description" content="P-Kids GPdI Mahanaim Tegal">
    <meta property="og:image" itemprop="image" content="{{ asset('assets/logo.png') }}">
    <!-- End Open Graph -->
    <title>P-Kids</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wdth,wght@75..125,300..700&display=swap"
        rel="stylesheet">
    {{-- End Font --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body >
    <!-- ========== MAIN CONTENT ========== -->
    @yield('kids')
    <!-- ========== END MAIN CONTENT ========== -->
    <!-- GPDI logo with text -->
    <div class="absolute left-0 right-0 flex items-center justify-center mt-6 bottom-2">
        <img class="w-1/12 md:w-10" src="{{ asset('assets/gpdi_logo.png') }}" alt="logo gpdi">
        <span class="ml-2 text-sm text-gray-500">by GPdI Mahanaim Tegal</span>
    </div>
</body>

</html>
