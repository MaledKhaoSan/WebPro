<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/input.css') }}">
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">
</head>
<body>
    
    <section id="orderCart" class="block overflow-y-auto fixed inset-0 h-screen bg-white z-40">
        <div class="bg-white p-4 py-1 h-20 w-full flex flex-row gap-5 items-center text-[#75639C] fixed z-40">
            
            <a href="{{ url('/orderfood') }}" class="bg-none w-10 h-10 flex justify-center items-center rounded-full cursor-pointer">
                <svg class="w-10 h-10 p-2 fixed text-[#75639C]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="m15 19-7-7 7-7"/>
                </svg>
            </a>
            <p>รายการอาหาร</p>
        </div>
    
        <div id="orderDetailsContainer" class="mt-16 p-5 py-7 px-4 flex flex-col gap-1">
            @foreach($orderDetails as $orderItem)
            
            <div class="flex flex-row items-center relative gap-1 py-6 border-t border-gray-100">
                @php
                    $menu = App\Models\Menu::find($orderItem['menu_id']);
                @endphp
                <div class="flex-none w-14 h-20 rounded-2xl overflow-hidden">
                    <img class="inset-1 object-cover object-center w-full h-full" src="{{ 'data:image/png;base64,' . base64_encode($menu->menu_img) }}">
                </div>
                
                
                <div class="flex flex-col items-start justify-between gap-2 w-full px-3">
                    <p class="text-[#75639C] text-xl">{{ $menu->menu_name }}</p>

                    <div class="flex flex-row w-full justify-between space-x-4">
                        <p class="text-gray-700 text-xl">฿ {{ $menu->price }}</p>
                        

                        <div class="flex items-center border border-[#6E62E5] px-1 py-0.5 rounded-2xl">
                            <svg class="w-6 h-6 p-1 text-[#6E62E5]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/>
                            </svg>
                            
                            <p class="text-gray-700 text-xs text-center w-10">{{ $orderItem['quantity'] }}</p>

                            <svg class="w-6 h-6 p-1 text-[#6E62E5]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                            </svg>
                        </div>
                    </div>
                </div>                
            </div>
            @endforeach
        </div>
        <div class="bg-white flex flex-col justify-between m-auto px-8 fixed bottom-0 w-full pt-3 pb-5">    
            <div class="flex flex-row items-center justify-between gap-3 mb-2">
                <p class="text-sm font-normal text-[#6E62E5]">ส่วนลด</p>
                <p class="text-lg">-120 THB</p>
            </div>

            <div class="flex flex-row items-center justify-between gap-3 mb-5">
                <p class="font-normal text-[#6E62E5]">ยอดที่ต้องชำระ</p>
                <p class="text-xl">12390 THB</p>
            </div>
            
            <div id="menuDetailAdd" class="bg-[#6E62E5] px-8 py-3 my-4 rounded-2xl text-white w-full text-center">
                <p>เพิ่มรายการอาหาร</p>
            </div>
        </div>
    </section>
</body>
</html>
<script src="{{ asset('/js/orderfoodmanagement.js') }}"></script>