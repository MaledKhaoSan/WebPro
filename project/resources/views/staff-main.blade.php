@extends('layouts.staff-layouts')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-row gap-3">
    <h1 class="font-extralight text-5xl">หน้าหลัก</h1>
</div>
<hr class="my-2">
{{-- notification bar --}}
<div class="flex flex-col gap-1">
    <a href="{{ url('/summary') }}" class="grid grid-cols-2 items-center bg-[#6E62E5] w-full p-3 rounded-xl">
        <h6 class="justify-self-start text-start text-white text-xl">แจ้งเตือนจากในครัว : <strong class="text-[#e3e562] font-bold">98</strong> ออเดอร์ พร้อมเสิร์ฟแล้ว</h6>
        <h6 class="justify-self-end text-end text-white text-xl">></h6>
    </a>
    <a href="{{ url('/summary') }}" class="grid grid-cols-2 items-center bg-[#6E62E5] w-full p-3 rounded-xl">
        <h6 class="justify-self-start text-start text-white text-xl">แจ้งเตือนจากในร้าน : <strong class="text-[#e3e562] font-bold">3</strong> โต๊ะ พร้อมให้บริการแล้ว</h6>
        <h6 class="justify-self-end text-end text-white text-xl">></h6>
    </a>
</div>
<div class="grid grid-row-2 gap-1 px-5 py-5 items-center">
    <div class="grid grid-cols-2 gap-20 px-5 py-5 items-center">
        <div class="grid grid-row-2 gap-20 px-5 py-5 items-center h-full">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white h-full">
                <h1 class="text-3xl font-bold text-start"> กำไรวันนี้💰 </h1>
                <h1 class="text-7xl text-start text-green-600 font-bold">฿ {{$total}} </h1>
                <h1 class="text-xl text-start"> 💹เพิ่มขึ้น 28% จากเมื่อวาน </h1>
                <a href='./summary.blade.php' class="text-sm text-end font-bold text-gray-500/50"> > หน้าแสดงยอดขาย </a>
            </div>
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white h-full">
                <h1 class="text-2xl  text-start font-bold text-red-800">กำลังรออยู่ <strong>1</strong> คิว</h1>
                <div class="grid grid-cols-3 gap-5 items-center h-full">
                    <div class="flex flex-col gap-1 shadow-xl p-5 rounded-2xl bg-gray-100 h-full justify-center">
                        <h1 class="text-center text-xl font-bold"> #128 </h1>
                        <h1 href='./summary.blade.php' class="text-xs text-center font-bold text-gray-500/50">12 นาที 10 วินาที</a>
                    </div>
                    <div class="flex flex-col gap-1 shadow-xl p-5 rounded-2xl bg-gray-100 h-full justify-center">
                        <h1 class="text-center text-xl font-bold"> #129 </h1>
                        <h1 href='./summary.blade.php' class="text-xs text-center font-bold text-gray-500/50">15 นาที 20 วินาที</a>
                    </div>
                    <div class="flex flex-col gap-1 shadow-xl p-5 rounded-2xl bg-gray-100 h-full justify-center">
                        <h1 class="text-center text-xl font-bold"> #130 </h1>
                        <h1 href='./summary.blade.php' class="text-xs text-center font-bold text-gray-500/50">20 นาที 30 วินาที</a>
                    </div>
                </div>
                <a href='./queue.blade.php' class="text-sm text-end font-bold text-gray-500/50"> > หน้าดูลำดับคิว </a>
            </div>
        </div>

        <div class="grid grid-row-2 gap-20 px-5 py-5 items-center h-full">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white h-full">
                <h1 class="text-3xl text-start font-bold text-black"> เมนูขายดี 3 อันดับ🏆 </h1>
                <div class="grid grid-row-3 gap-5 h-full">
                    @foreach($tops as $items)
                    <div class="flex flex-row gap-5 shadow-xl p-5 rounded-2xl bg-white h-full">
                        <h1 class="text-2xl text-start font-bold"> {{$loop->iteration}} </h1>
                        <img class="w-16 h-16 object-cover rounded-xl" src="{{ 'data:image/png;base64,' . base64_encode($items->menu_img) }}">
                        <div>
                            <h1 class="text-start text-xl font-bold"> {{$items->menu_name}} </h1>
                            <h1 href='./summary.blade.php' class="text-sm text-start font-bold text-gray-600/80">{{$items->description}}</a>
                            <h1 href='./summary.blade.php' class="text-sm text-start font-bold text-gray-500/80">ยอดการสั่งซื้อ : {{$items->sales}}</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
