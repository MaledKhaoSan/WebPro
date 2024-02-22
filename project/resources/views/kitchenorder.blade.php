@extends('layouts.chief-layouts')

@section('title', 'Example Page')

@section('content')
    <h1 class="prompt pb-5 font-extralight text-2xl">ออร์เดอร์ที่กำลังดำเนินการอยู่</h1>

    <div class="columns-3 gap-5">
        @foreach ($order as $order)
        <div class="break-inside-avoid rounded-xl mb-2 p-4 bg-gray-100">
            <div class="flex flex-row justify-between">
                <div>
                    <h1 class="text-xl text-[#75639C]">{{ $order->order_type }}</h1>
                    <p class="text-xl">Table {{ $order->table_id }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xl text-[#75639C]">#{{ $order->queue_id }}</p>
                    <p class="text-xl">เวลา</p>
                </div>
            </div>
            <p class="text-[#817e7e] pb-2">สถานะออร์เดอร์: {{ $order->order_status }}</p>
            <div class="flex flex-col">
                <div class="flex flex-row text-left text-sm text-[#817e7e]">
                    <p class="w-1/6">จำนวน</p>
                    <p class="w-2/3">รายการอาหาร</p>
                    <p class="w-1/6">สถานะ</p>
                </div>

                <hr class="my-2 border-t-1 border-[#926EFF]">


                @foreach ($order->orderDetails as $orderDetail)
                    @if($orderDetail->order_stage === 'ยกเลิก')
                    <div class="flex flex-row px-2 py-2 bg-[#EAECF5] rounded-xl my-0.5 line-through text-[#ff7979]">
                        <span class="w-1/6 flex flex-row">x<p class="text-[#926EFF]">{{ $orderDetail->quantity }}</p></span>
                        <p class="w-full">{{ $orderDetail->menu->menu_name }}</p>
                        <p class="w-1/3 text-right rounded-lg px-2 text-center">{{ $orderDetail->order_stage }}</p>
                    </div> 
                    @else
                    <div class="flex flex-row px-2 py-2 bg-[#EAECF5] rounded-xl my-0.5">
                        <span class="w-1/6 flex flex-row">x<p class="text-[#926EFF]">{{ $orderDetail->quantity }}</p></span>
                        <p class="w-full">{{ $orderDetail->menu->menu_name }}</p>
                        <p class="w-1/3 text-right text-[#926EFF] cursor-pointer">{{ $orderDetail->order_stage }}</p>
                    </div>
                    @endif
                @endforeach

            
            </div>

            <!-- <button class="mt-3 w-full rounded-md py-1 cursor-pointer bg-[#d1ccf8] text-[#6E62E5] hover:bg-[#6E62E5] hover:text-[#ffffff]">
                แจ้งเตือนพนักงานให้นำไปเสิร์ฟ
            </button> -->
        </div>
        @endforeach
    </div>
    
    
    
    
    

    <!-- <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="col-span-2 group p-4 bg-gray-100">
            <p>Text</p>
        </div>

        <div class="col-span-2 group p-4 bg-gray-100">
            <p>2</p>
        </div>
        
        <div class="col-span-2 group p-4 bg-gray-100">
            <p>3</p>
        </div>
    </div> -->

    <!-- <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <div class="group p-4 bg-gray-100">
            <img class="w-full h-auto rounded" src="image1.jpg" alt="Image 1">
        </div>
    </div> -->
    
@endsection
