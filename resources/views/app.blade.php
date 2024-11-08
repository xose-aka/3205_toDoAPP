<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @viteReactRefresh
    @vite('resources/js/app.tsx')  <!-- Add this line to load your compiled JS -->
    @inertiaHead
</head>
<body>
    @inertia
{{--    <div id="app" data-page="{{ json_encode($page) }}"></div>--}}
</body>
</html>
