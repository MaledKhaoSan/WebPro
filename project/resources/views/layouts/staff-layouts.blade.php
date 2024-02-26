<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Laravel Example')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/restaurant_logo.jpeg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">      

</head>
<body class="bg-[#E6EAF3] grid grid-cols-12 gap-32 relative">
    <div class=" bg-white w-60 h-screen fixed px-5 overflow-hidden">
        <div class="flex items-center justify-start mt-5 mb-5">
            <img src="{{ asset('asset/restaurant_logo.jpeg') }}" alt="Restaurant Logo" class="w-16 h-16 mr-2">
            <div class="flex flex-col">
                <h1 class="text-2xl font-bold">HOTARU</h1>
                <h2 class="text-sm font-bold">DASHBOARD</h1>
            </div>
        </div>

        <hr class="my-5">

        <div class="flex flex-col gap-3">
            <a href="{{ url('/staff-main') }}">
                <div class="layout_tab">
                    <img src="{{ asset('asset/main.png') }}" alt="Restaurant Logo" width="30" height="30" >
                    <h6>หน้าหลัก</h6>
                </div>
            </a>
            <a href="{{ url('/summary') }}">
                <div class="layout_tab">
                <img src="{{ asset('asset/summary.png') }}" alt="Restaurant Logo" width="30" height="30" >
                    <h6>ยอดขาย</h6>
                </div>
            </a>
        </div>
    </div>
    <section class="col-start-3 col-span-full bg-white my-7 mr-7 p-4 rounded-xl relative">
        @yield('content')
    </section>
</body>
</html>
