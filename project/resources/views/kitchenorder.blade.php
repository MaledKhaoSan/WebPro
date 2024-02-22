@extends('layouts.chief-layouts')

@section('title', 'Example Page')

@section('content')
    <h1 class="prompt pb-5 font-extralight text-2xl">ออเดอร์ทั้งหมด</h1>
    <div class="flex flex-row justify-start gap-4">
        <div class="rounded-xl mb-2 py-4 pl-2 pr-4 border-2 border-[#dde3ed] text-[#75639C] flex flex-row justify-between items-center gap-4">
            <p class="h-full text-8xl">🧑🏻‍🍳</p>
            <div class="flex flex-col justify-between h-full">
                <div class="flex flex-row justify-between items-center gap-3">
                    <h1 class="text-xl">ออเดอร์ที่รออยู่</h1>
                </div>

                <div class="flex flex-row justify-between items-end gap-10">
                    <div class="flex flex-col">
                        <p class="text-3xl">{{ $inProcessCount }}</p>
                        <p class="text-xs">ออเดอร์</p>
                    </div>
    
                    <div class="flex flex-col text-left">
                        <p class="text-3xl text-gray-400">{{ ($inProcessCount / ($inProcessCount + $completeCount)) * 100 }}%</p>
                        <p class="text-xs text-gray-400">ของออเดอร์ทั้งหมด</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-xl mb-2 py-4 pl-2 pr-4 border-2 border-[#dde3ed] text-[#75639C] flex flex-row justify-between items-center gap-4">
            <p class="h-full text-8xl">🍽</p>
            <div class="flex flex-col justify-between h-full">
                <div class="flex flex-row justify-between items-center gap-3">
                    <h1 class="text-xl">ออเดอร์ที่เสิร์ฟแล้ว</h1>
                </div>

                <div class="flex flex-row justify-between items-end gap-10">
                    <div class="flex flex-col">
                        <p class="text-3xl">{{ $completeCount }}</p>
                        <p class="text-xs">ออเดอร์</p>
                    </div>
    
                    <div class="flex flex-col text-left">
                        <p class="text-3xl text-gray-400">{{ ($completeCount / ($inProcessCount + $completeCount)) * 100 }}%</p>
                        <p class="text-xs text-gray-400">ของออเดอร์ทั้งหมด</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row items-center justify-between gap-8 text-sm mb-2">
        <h1 class="prompt py-5 font-extralight text-2xl">ออเดอร์ที่กำลังดำเนินการอยู่</h1>
        <div class="flex flex-row gap-3">

            
            <a href="{{ url('/kitchenorder') }}?allDisplay=true" class="rounded-3xl py-1 px-4 pr-2 border-[1px] border-[#dde3ed] cursor-pointer">
                <div class="flex flex-row items-center">
                    <p>ออเดอร์ทั้งหมด</p>
                    <svg class="w-6 h-6 p-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>
            </a>
    
            <a href="{{ url('/kitchenorder') }}?inprocessDisplay=true" class="rounded-3xl py-1 px-4 pr-2 border-[1px] border-[#dde3ed] cursor-pointer">
                <div class="flex flex-row items-center">
                    <p>รออยู่</p>
                    <svg class="w-6 h-6 p-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>
            </a>
    
            <a href="{{ url('/kitchenorder') }}?completeDisplay=true" class="rounded-3xl py-1 px-4 pr-2 border-[1px] border-[#dde3ed] cursor-pointer">
                <div class="flex flex-row items-center">
                    <p>เสร็จแล้ว</p>
                    <svg class="w-6 h-6 p-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>
            </a>

            <a href="{{ url('/kitchenorder') }}?canceledDisplay=true" class="rounded-3xl py-1 px-4 pr-2 border-[1px] border-[#dde3ed] cursor-pointer">
                <div class="flex flex-row items-center">
                    <p>ยกเลิก</p>
                    <svg class="w-6 h-6 p-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                    </svg>
                </div>
            </a>


            <script>
                function updateDisplayOption(displayOption) {

                    
                }
            </script>







            
        </div>
    </div>

    <div class="columns-3 gap-5">
        @foreach ($order as $order)
            @if($order->order_status === 'pending')
                <div class="break-inside-avoid rounded-xl mb-2 p-4 border-2 border-[#dde3ed]">
                    <div class="flex flex-row justify-between text-[#75639C]">
                        <div>
                            <h1 class="text-xl">{{ $order->order_type }}</h1>
                            <p class="text-xl">Table {{ $order->table_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl">คิวที่ #{{ $order->queue_id }}</p>
                            <p class="text-xl">{{ $order->order_time }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 flex flex-row  pb-4">สถานะออเดอร์:<span class="font-normal px-3 rounded-lg">{{ $order->order_status }}</span></p>
                    <div class="flex flex-col">
                    <div class="flex flex-row text-left text-sm text-gray-400">
                        <p class="w-1/6">จำนวน</p>
                        <p class="w-2/3">รายการอาหาร</p>
                        <p class="w-1/6">สถานะ</p>
                    </div>

                    <hr class="my-2 border-t-1 border-[#dde3ed]">
    
    
                    @foreach ($order->orderDetails as $orderDetail)
                        @if($orderDetail->order_stage === 'ยกเลิก')
                            <div class="flex flex-row px-2 py-2 bg-[#eef1f6] rounded-xl my-0.5 relative">
                                <p class="text-gray-400 w-1/6">x{{ $orderDetail->quantity }}</p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <p class="text-gray-400 w-1/3 text-right rounded-lg px-2">{{ $orderDetail->order_stage }}</p>
                                <div class="bg-gray-400 inset-0 top-1/2  mx-2 w-auto h-0.5 absolute"></div>
                            </div> 
                        @else
                        <div class="flex flex-row px-2 py-2 border border-[#eef1f6] rounded-xl my-0.5">
                            <p class="text-gray-400 flex flex-row  w-1/6">
                                x<span class="">{{ $orderDetail->quantity }}</span>
                            </p>
                            <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                            <p class="text-gray-400 w-1/3  text-right">{{ $orderDetail->order_stage }}</p>
                        </div>
                        @endif
                    @endforeach
                        <a class="mt-6" href="{{ route('updateOrderStatus', ['orderId' => $orderDetail->order_id]) }}">
                            <button class="w-full rounded-xl py-2 cursor-pointer border text-[#6E62E5] bg-[#ffffff] border-[#6E62E5] hover:text-[#ffffff] hover:bg-[#917eba] hover:border-opacity-0">
                                เริ่มต้นทำออเดอร์🧑🏻‍🍳
                            </button> 
                        </a>  
                    </div>
                </div>
            @elseif($order->order_status === 'in-process')
                <div class="break-inside-avoid rounded-xl mb-2 p-4 border-2 border-[#dde3ed]">
                    <div class="flex flex-row justify-between text-[#75639C]">
                        <div>
                            <h1 class="text-xl">{{ $order->order_type }}</h1>
                            <p class="text-xl">Table {{ $order->table_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl">คิวที่ #{{ $order->queue_id }}</p>
                            <p class="text-xl">{{ $order->order_time }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 flex flex-row  pb-4">สถานะออเดอร์:<span class="bg-[#FFA16B] text-[#ffffff] ml-3 font-normal px-3 rounded-lg">{{ $order->order_status }}</span></p>
                    <div class="flex flex-col">
                    <div class="flex flex-row text-left text-sm text-gray-400">
                        <p class="w-1/6">จำนวน</p>
                        <p class="w-2/3">รายการอาหาร</p>
                        <p class="w-1/6">สถานะ</p>
                    </div>

                    <hr class="my-2 border-t-1 border-[#dde3ed]">


                    @foreach ($order->orderDetails as $orderDetail)
                        @if($orderDetail->order_stage === 'ยกเลิก')
                            <div class="flex flex-row px-2 py-2 bg-[#eef1f6] rounded-xl my-0.5 relative">
                                <p class="text-gray-400 w-1/6">x{{ $orderDetail->quantity }}</p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <p class="text-gray-400 w-1/3 text-right rounded-lg px-2">{{ $orderDetail->order_stage }}</p>
                                <div class="bg-gray-400 inset-0 top-1/2  mx-2 w-auto h-0.5 absolute"></div>
                            </div> 
                        
                        @elseif($orderDetail->order_stage === 'กำลังทำ')
                        <a href="{{ route('completeOrderStage', ['orderId' => $orderDetail->order_id, 'menuId' => $orderDetail->menu_id]) }}">
                            <div class="flex flex-row px-2 py-2 bg-[#FCAE58] rounded-xl my-0.5">
                                <p class="text-[white] flex flex-row  w-1/6">
                                    x<span class="">{{ $orderDetail->quantity }}</span>
                                </p>
                                <p class="text-[white] w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <div class="w-7/12 flex flex-row items-center justify-end gap-3">
                                    <p class="text-[white] cursor-pointer">{{ $orderDetail->order_stage }}</p>
                                    
                                    <div class="inline-flex items-center">
                                        
                                        <div class="border-[white] relative h-6 w-6 cursor-pointer rounded-md border flex justify-center items-center">
                                            
                                        </div>  
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                        @elseif($orderDetail->order_stage === 'เสร็จแล้ว')
                        <div class="flex flex-row px-2 py-2 bg-[#47BCB0] rounded-xl my-0.5">
                            <p class="text-[white] flex flex-row  w-1/6">
                                x<span class="">{{ $orderDetail->quantity }}</span>
                            </p>
                            <p class="text-[white] w-full ">{{ $orderDetail->menu->menu_name }}</p>
                            <div class="w-7/12 flex flex-row items-center justify-end gap-3">
                                <p class="text-[white] cursor-pointer">{{ $orderDetail->order_stage }}</p>
                                

                                
                                <div class="inline-flex items-center">
                                    <div class="border-[white] relative h-6 w-6 cursor-pointer rounded-md border flex justify-center items-center">
                                        <span class="absolute text-white transition-opacity pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                            <svg class="p-0.5 w-6 h-6 text-[white]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4.7 4.5 9.3-9"/>
                                            </svg>
                                        </span>
                                    </div>  
                                    
                                </div>



                            </div>
                        </div>
                        @else
                        <a href="{{ route('updateOrderStage', ['orderId' => $orderDetail->order_id, 'menuId' => $orderDetail->menu_id]) }}">
                            <div class="flex flex-row px-2 py-2 bg-[#eef1f6] rounded-xl my-0.5">
                                <p class="text-gray-400 flex flex-row  w-1/6">
                                    x<span class="">{{ $orderDetail->quantity }}</span>
                                </p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <div class="w-7/12 flex flex-row items-center justify-end gap-3">
                                    <p class="text-gray-400 cursor-pointer">{{ $orderDetail->order_stage }}</p>
                                    
                                    <div class="inline-flex items-center">

                                        <svg class="p-0.5 w-6 h-6 text-gray-800 dark:text-[#6E62E5]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                                        </svg>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                    @endforeach
                    
                        <button onclick="showConfirmDialog('{{ $orderDetail->order_id }}')" class="mt-6 w-full rounded-xl py-2 cursor-pointer border text-[#6E62E5] bg-[#ffffff] border-[#6E62E5] hover:text-[#ffffff] hover:bg-[#47BCB0] hover:border-opacity-0">
                            เสิร์ฟ
                        </button>
                    
                    </div>
                </div>
            @elseif($order->order_status === 'complete')
                <div class="break-inside-avoid rounded-xl mb-2 p-4 border-2 border-[#dde3ed]">
                    <div class="flex flex-row justify-between text-[#75639C]">
                        <div>
                            <h1 class="text-xl">{{ $order->order_type }}</h1>
                            <p class="text-xl">Table {{ $order->table_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl">คิวที่ #{{ $order->queue_id }}</p>
                            <p class="text-xl">{{ $order->order_time }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 flex flex-row  pb-4">สถานะออเดอร์:<span class="bg-[#47BCB0] text-[#ffffff] ml-3 font-normal px-3 rounded-lg">{{ $order->order_status }}</span></p>
                    <div class="flex flex-col">
                        <div class="flex flex-row text-left text-sm text-gray-400">
                            <p class="w-1/6">จำนวน</p>
                            <p class="w-2/3">รายการอาหาร</p>
                            <p class="w-1/6">สถานะ</p>
                        </div>

                        <hr class="my-2 border-t-1 border-[#dde3ed]">
                        @foreach ($order->orderDetails as $orderDetail)
                            @if($orderDetail->order_stage === 'ยกเลิก')
                                <div class="flex flex-row px-2 py-2 bg-[#eef1f6] rounded-xl my-0.5 relative">
                                    <p class="text-gray-400 w-1/6">x{{ $orderDetail->quantity }}</p>
                                    <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                    <p class="text-gray-400 w-1/3 text-right rounded-lg px-2">{{ $orderDetail->order_stage }}</p>
                                    <div class="bg-gray-400 inset-0 top-1/2  mx-2 w-auto h-0.5 absolute"></div>
                                </div> 
                            @else
                            <div class="flex flex-row px-2 py-2 border border-[#eef1f6] rounded-xl my-0.5">
                                <p class="text-gray-400 flex flex-row  w-1/6">
                                    x<span class="">{{ $orderDetail->quantity }}</span>
                                </p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <p class="text-gray-400 w-1/3  text-right">{{ $orderDetail->order_stage }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @elseif($order->order_status === 'paid')
                <div class="break-inside-avoid rounded-xl mb-2 p-4 border-2 border-[#dde3ed]">
                    <div class="flex flex-row justify-between text-[#75639C]">
                        <div>
                            <h1 class="text-xl">{{ $order->order_type }}</h1>
                            <p class="text-xl">Table {{ $order->table_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl">คิวที่ #{{ $order->queue_id }}</p>
                            <p class="text-xl">{{ $order->order_time }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 flex flex-row pb-4">สถานะออเดอร์:<span class="bg-[#A776FF] text-[#ffffff] ml-3 font-normal px-5 rounded-lg">{{ $order->order_status }}</span></p>
                    <div class="flex flex-col">
                        <div class="flex flex-row text-left text-sm text-gray-400">
                            <p class="w-1/6">จำนวน</p>
                            <p class="w-2/3">รายการอาหาร</p>
                            <p class="w-1/6">สถานะ</p>
                        </div>

                        <hr class="my-2 border-t-1 border-[#dde3ed]">
                        @foreach ($order->orderDetails as $orderDetail)
                            @if($orderDetail->order_stage === 'ยกเลิก')
                                <div class="flex flex-row px-2 py-2 bg-[#eef1f6] rounded-xl my-0.5 relative">
                                    <p class="text-gray-400 w-1/6">x{{ $orderDetail->quantity }}</p>
                                    <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                    <p class="text-gray-400 w-1/3 text-right rounded-lg px-2">{{ $orderDetail->order_stage }}</p>
                                    <div class="bg-gray-400 inset-0 top-1/2  mx-2 w-auto h-0.5 absolute"></div>
                                </div> 
                            @else
                            <div class="flex flex-row px-2 py-2 border border-[#eef1f6] rounded-xl my-0.5">
                                <p class="text-gray-400 flex flex-row  w-1/6">
                                    x<span class="">{{ $orderDetail->quantity }}</span>
                                </p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <p class="text-gray-400 w-1/3  text-right">{{ $orderDetail->order_stage }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>

            @elseif($order->order_status === 'cancel')
                <div class="break-inside-avoid rounded-xl mb-2 p-4 border-2 border-[#dde3ed]">
                    <div class="flex flex-row justify-between text-[#75639C]">
                        <div>
                            <h1 class="text-xl">{{ $order->order_type }}</h1>
                            <p class="text-xl">Table {{ $order->table_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xl">คิวที่ #{{ $order->queue_id }}</p>
                            <p class="text-xl">{{ $order->order_time }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 flex flex-row  pb-4">สถานะออเดอร์:<span class="bg-[#ff688e] text-[#ffffff] ml-3 font-normal px-3 rounded-lg">{{ $order->order_status }}</span></p>
                    <div class="flex flex-col">
                        <div class="flex flex-row text-left text-sm text-gray-400">
                            <p class="w-1/6">จำนวน</p>
                            <p class="w-2/3">รายการอาหาร</p>
                            <p class="w-1/6">สถานะ</p>
                        </div>

                        <hr class="my-2 border-t-1 border-[#dde3ed]">
                        @foreach ($order->orderDetails as $orderDetail)
                            @if($orderDetail->order_stage === 'ยกเลิก')
                                <div class="flex flex-row px-2 py-2 border border-[#eef1f6] rounded-xl my-0.5 relative">
                                    <p class="text-gray-400 w-1/6">x{{ $orderDetail->quantity }}</p>
                                    <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                    <p class="text-gray-400 w-1/3 text-right rounded-lg px-2">{{ $orderDetail->order_stage }}</p>
                                    <div class="bg-gray-400 inset-0 top-1/2  mx-2 w-auto h-0.5 absolute"></div>
                                </div> 
                            @else
                            <div class="flex flex-row px-2 py-2 border border-[#eef1f6] rounded-xl my-0.5">
                                <p class="text-gray-400 flex flex-row  w-1/6">
                                    x<span class="">{{ $orderDetail->quantity }}</span>
                                </p>
                                <p class="text-gray-400 w-full ">{{ $orderDetail->menu->menu_name }}</p>
                                <p class="text-gray-400 w-1/3  text-right">{{ $orderDetail->order_stage }}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>   
    
    

    <div id="confirmPanel" class="hidden fixed inset-0 z-10 w-screen overflow-y-auto bg-[#322d349e]">
        <div class="flex min-h-full">
            <div class="relative bg-white w-1/5 m-auto rounded-xl px-9 py-10 flex flex-col items-center gap-4 text-center">
                <a href="" onclick="hideConfirmDialog()" class="cursor-pointer absolute top-1.5 right-1.5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 25 25" fill="none" role="img" class="icon icon-24 lazyloaded">
                    <rect x="3" y="5" width="18" height="16" fill="#6E62E5"></rect>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5051 0.135254C14.9528 0.135152 17.3455 0.860879 19.3807 2.22066C21.416 3.58044 23.0022 5.51321 23.939 7.77453C24.8757 10.0359 25.1209 12.5242 24.6434 14.9248C24.166 17.3255 22.9873 19.5306 21.2566 21.2614C19.5259 22.9922 17.3207 24.1709 14.9201 24.6485C12.5195 25.126 10.0311 24.881 7.76979 23.9443C5.50843 23.0076 3.57561 21.4214 2.21576 19.3862C0.855913 17.3511 0.130107 14.9583 0.130127 12.5107C0.130141 9.22858 1.43392 6.08092 3.75467 3.76009C6.07542 1.43926 9.22304 0.135377 12.5051 0.135254V0.135254ZM7.13525 16.4156C6.9463 16.6101 6.84148 16.8711 6.84346 17.1423C6.84544 17.4135 6.95406 17.6729 7.14583 17.8647C7.3376 18.0564 7.59711 18.1649 7.86827 18.1668C8.13943 18.1687 8.40044 18.0638 8.59488 17.8748L12.4997 13.9699L16.4103 17.8805C16.6047 18.0698 16.8659 18.1749 17.1372 18.1731C17.4085 18.1712 17.6682 18.0626 17.8601 17.8707C18.0519 17.6788 18.1605 17.4191 18.1623 17.1478C18.164 16.8765 18.0589 16.6153 17.8695 16.421L13.9592 12.5106L17.8847 8.58516C18.072 8.39039 18.1754 8.12994 18.1727 7.85976C18.1701 7.58958 18.0616 7.33122 17.8705 7.14017C17.6795 6.94911 17.4211 6.8406 17.1509 6.83794C16.8808 6.83529 16.6203 6.93869 16.4255 7.12594L12.4997 11.051L8.57998 7.13125C8.38644 6.93769 8.12393 6.82894 7.8502 6.82892C7.57647 6.82891 7.31394 6.93763 7.12038 7.13118C6.92681 7.32472 6.81806 7.58724 6.81804 7.86097C6.81803 8.13469 6.92675 8.39722 7.1203 8.59078L11.0402 12.5106L7.13525 16.4156Z" fill="white"></path>
                    </svg>
                </a>

                <div class="bg-[#fff396]  p-3 mb-7 rounded-full">
                    <p class="h-full text-5xl m-1">⚠️</p>
                </div>
                    
                <div class="flex flex-col items-center gap-6 mb-7">
                    <h1 class="text-xl font-normal text-[#786fda]">ยืนยันว่าออเดอร์เสร็จแล้ว</h1>
                    <p class="text-sm text-wrap">เมื่อยืนยันระบบจะอัพเดทสถานะ<br>ของออเดอร์และ<span class="text-gray-400"> แจ้งเตือน </span> ให้เตรียม การเสิร์ฟออเดอร์นี้แก่ลูกค้าทันที</p>
                    
                </div>

                <a id="confirmButton" class="w-full" href="#">
                    <button class="w-full rounded-3xl py-2 cursor-pointer border text-[#6E62E5] bg-[#ffffff] border-[#6E62E5] hover:text-[#ffffff] hover:bg-[#6E62E5] hover:border-opacity-0">
                        ยืนยันการเสิร์ฟออเดอร์
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div id="alertboxDisplay" class="absolute z-10 flex flex-col gap-6 top-0 right-0 p-4 pr-6"></div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>

    @if (Session::has('alert'))
        <script>
            var alertContainer = `@php echo view("components.alert-box", ["title" => Session::get('alert')['title'], "message" => json_encode(Session::get('alert')['message']) ])->render(); @endphp`;
            document.getElementById('alertboxDisplay').insertAdjacentHTML('beforeend', alertContainer);
        </script>
    @endif
    <script>
        function showConfirmDialog(orderId) {
            var confirmButton = document.getElementById('confirmButton');
            var confirmPanel = document.getElementById('confirmPanel');

            confirmButton.href = `{{ url('kitchenorder/completeOrderStatus') }}/${orderId}`;
            confirmPanel.style.display = 'block';
        }

        function hideConfirmDialog() {
            var confirmPanel = document.getElementById('confirmPanel');
            confirmPanel.style.display = 'hidden';
        }
    </script>


@endsection

