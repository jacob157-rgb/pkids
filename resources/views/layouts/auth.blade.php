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
    <title>P-Kids | Login</title>
    <link rel="shortcut icon" href="{{ asset('assets/favicon.png') }}" type="image/x-icon">
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wdth,wght@75..125,300..700&display=swap" rel="stylesheet">
    {{-- End Font --}}
    <!-- Styles -->
    <!-----------------------------------------------------------
    -- animate.min.css by Daniel Eden (https://animate.style)
    -- is required for the animation of notifications and slide out panels
    -- you can ignore this step if you already have this file in your project
    --------------------------------------------------------------------------->
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center h-screen">
<!-- ========== MAIN CONTENT ========== -->
@yield('auth')
<!-- ========== END MAIN CONTENT ========== -->
</body>

</html>