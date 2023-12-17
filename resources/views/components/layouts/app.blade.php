<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- COMPONENTS BLADE --}}
    <title>Aprendible - {{ $title ?? '' }}</title>
    <meta name="description" content="{{ $metaDescription ?? 'Default meta description' }}" />
    
    <!--ADD STYLES AND JS CON VITE OF NODE JS -->
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/sass/app.scss'])

    <!--ADD STYLES BOOTSTRAP AND JS CON VITE OF NODE JS -->
    {{-- @vite(['resources/js/app.js', 'resources/sass/app.scss']) --}}


    {{-- <!--ADD STYLES DESDE LA CARPETA PUBLIC CSS Y JS CUSTOM -->
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script> --}}

</head>

<style>
    .status {
        position: relative;
        background-color: green;
        color: white;
        font-weight: bold;
    }
</style>

<body class="antialiased bg-slate-100 dark:bg-slate-900">
    <x-layouts.navegation />

    @if (session('status'))
        <div class="status">
            {{ session('status') }}
        </div>
    @endif


    {{ $slot }}
</body>

</html>
