<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Laravel Example')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/restaurant_logo.jpeg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">

</head>
<body class="bg-[#E6EAF3] grid grid-cols-12 gap-32 relative">
    <div class=" bg-white w-60 h-screen fixed px-5 overflow-hidden">
        <div class="flex items-center justify-start mt-5 mb-5">
            <img src="{{ asset('asset/restaurant_logo.jpeg') }}" alt="Restaurant Logo" class="w-16 h-16 mr-2">
            <h1 class="text-2xl font-bold">HOTARU</h1>
        </div>

        <hr class="my-5">

        <div class="flex flex-col gap-3">
            <a href="{{ url('/kitchenorder') }}">
                <div class="flex items-center justify-start gap-4 px-3 py-2 border-white rounded-lg group hover:bg-[#6E62E5] cursor-pointer">
                    <img class="invert-[70%] group-hover:invert" src="https://cdn-icons-png.flaticon.com/512/2198/2198321.png" width="18" height="18">
                    <h6 class="text-[#817e7e] group-hover:text-white">รายการออร์เดอร์</h6>
                </div>
            </a>

            <a href="{{ url('/queue') }}">
                <div class="flex items-center justify-start gap-4 px-3 py-2 border-white rounded-lg group hover:bg-[#6E62E5] cursor-pointer">
                    <img class="invert-[70%] group-hover:invert" src="https://cdn-icons-png.flaticon.com/512/2198/2198321.png" width="18" height="18">
                    <h6 class="text-[#817e7e] group-hover:text-white">จัดการวัตถุดิบ</h6>
                </div>
            </a>

            <a href="{{ url('/menumanagement') }}">
                <div class="flex items-center justify-start gap-4 px-3 py-2 border-white rounded-lg group hover:bg-[#6E62E5] cursor-pointer">
                    <img class="invert-[70%] group-hover:invert" src="https://cdn-icons-png.flaticon.com/512/2198/2198321.png" width="18" height="18">
                    <h6 class="text-[#817e7e] group-hover:text-white">จัดการเมนู</h6>
                </div>
            </a>
        </div>
    </div>
    <section class="col-start-3 col-span-full bg-white my-7 mr-7 p-4 rounded-xl relative">
        @yield('content')
    </section>
</body>
</html>
