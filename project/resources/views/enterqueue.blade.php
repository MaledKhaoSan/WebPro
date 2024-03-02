@extends('layouts.staff-layouts')

@section('title', 'Queue')

@section('content')

<div class="flex flex-col justify-center">
    <div class="flex justify-center">
        <div class="card w-5/6 bg-white drop-shadow-xl rounded-2xl mt-5" style="height: 360px;">
            <div class="p-5 w-full bg-gray-200 rounded-t-3xl">
                <div class="grid grid-cols-2">
                    <div class="text-start">
                        <h1 class="text-4xl text-[#555FB5] font-medium">คิวโต๊ะ</h1>
                    </div>
                    <div class="text-end">
                        <button class="text-4xl text-[#555FB5] font-medium pr-5">+</button>
                    </div>
                </div>
            </div>
            <hr class="h-0.5 bg-gray-600">
            <table class="w-full gap-y-4">
                <tr class="text-center text-xl">
                    <th class="w-1/5">ลำดับคิว</th>
                    <th class="w-1/5">จำนวนคน</th>
                    <th class="w-1/5">เวลาที่รอ</th>
                    <th class="w-2/5">ยืนยันคิว</th>
                </tr>
                <tr class="text-center bg-gray-200">
                    <td>192</td>
                    <td>1-2 คน</td>
                    <td class="text-red-600">21 ชม. 12 นาที</td>
                    <td class="gap-2">
                        <button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                        <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button>
                    </td>
                </tr>
                <tr class="text-center ">
                    <td>193</td>
                    <td>3-4 คน</td>
                    <td>0 ชม. 8 นาที</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
                <tr class="text-center bg-gray-200">
                    <td>194</td>
                    <td>1-2 คน</td>
                    <td>0 ชม. 12 นาที</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
                <tr class="text-center ">
                    <td>195</td>
                    <td>3-4 คน</td>
                    <td>0 ชม. 15 นาที</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="h-2"></div>

    <div class="flex justify-center">
        <div class="card w-5/6 bg-white drop-shadow-xl rounded-2xl my-5" style="height: 360px;">
            <div class="p-5 w-full bg-gray-200 rounded-t-3xl">
                <div class="grid grid-cols-2">
                    <div class="text-start">
                        <h1 class="text-4xl text-[#555FB5] font-medium">รายการสั่งอาหาร</h1>
                    </div>
                    <div class="text-end">
                        <button class="text-4xl text-[#555FB5] font-medium pr-5">+</button>
                    </div>
                </div>
            </div>
            <hr class="h-0.5 bg-gray-600">
            <table class="w-full gap-y-4">
                <tr class="text-center text-xl">
                    <th class="w-1/5">ลำดับรายการ</th>
                    <th class="w-1/5">โต๊ะ/กลับบ้าน</th>
                    <th class="w-1/5">สถานะ</th>
                    <th class="w-2/5">ยืนยันการเสิร์ฟ</th>
                </tr>
                <tr class="text-center bg-gray-200">
                    <td>192</td>
                    <td>17</td>
                    <td class="text-green-500">รอเสิร์ฟ</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
                <tr class="text-center ">
                    <td>193</td>
                    <td>กลับบ้าน</td>
                    <td class="text-yellow-500">กำลังทำ</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
                <tr class="text-center bg-gray-200">
                    <td>194</td>
                    <td>2</td>
                    <td class="text-red-500">รอดำเนินการ</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
                <tr class="text-center">
                    <td>195</td>
                    <td>18</td>
                    <td class="text-red-500">รอดำเนินการ</td>
                    <td class="gap-2"><button class="bg-[#00CA99] text-white rounded-2xl hover:bg-[#35af90] transition duration-300 h-9 w-44">ยืนยันการเสิร์ฟ</button>
                    <button class="bg-[#E07575] text-white hover:bg-red-600 transition duration-300 rounded-2xl h-9 w-24">ยกเลิก</button></td>
                </tr>
            </table>
        </div>
    </div>
</div>



@endsection