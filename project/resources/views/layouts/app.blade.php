<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Example')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body>
    @yield('content')
    <div id="alertboxDisplay" class="absolute z-40 flex flex-col gap-6 bottom-0 mx-5"></div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>
    @if (Session::has('alert'))
        <script>
            var alertContainer = `@php echo view("components.mobilealert-box", ["title" => Session::get('alert')['title'], "message" => json_encode(Session::get('alert')['message']) ])->render(); @endphp`;
            document.getElementById('alertboxDisplay').insertAdjacentHTML('beforeend', alertContainer);
        </script>
    @endif
</body>
</html>




