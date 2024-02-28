@extends('layouts.staff-layouts')

@section('title', 'Summary')

@section('content')
<div class="flex flex-row gap-3">
    <h1 class="font-extralight text-5xl">ยอดขายภายในร้าน</h1>
</div>

<hr class="my-2">

<div class="flex flex-row gap-3">
    <a class="content_tab active" data-content="daily">
        <h6 class="activetext">ประจำวัน</h6>
    </a>
    <a class="content_tab" data-content="weekly">
        <h6>ประจำสัปดาห์</h6>
    </a>
    <a class="content_tab" data-content="monthly">
        <h6>ประจำเดือน</h6>
    </a>
    <a class="content_tab" data-content="yearly">
        <h6>ประจำปี</h6>
    </a>
</div>

<!-- create content for each tab -->
<div class="content">
    <div class="tab_content activecontent flex-col justify-center text-center" name="daily">
        <h1 class="text-2xl">{{ $chartday->options['chart_title'] }}</h1>
        <h1 class="text-sm">วันที่ <?php echo date("d-m-Y"); ?></h1>
        <!-- grid div -->
        <div class="grid grid-cols-2 gap-20 px-36 py-5 items-center">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-3xl text-start"> กำไรสุทธิ💰 </h1>
                <h1 class="text-7xl text-start text-green-600 font-bold"> ฿ 10,928 </h1>
                <h1 class="text-xl text-start"> 💹เพิ่มขึ้น 28% จากเมื่อวาน </h1>
            </div>
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-2xl  text-start">รายได้สุทธิ : ฿ 21,928</h1>
                <h1 class="text-2xl  text-start">ยอดลูกค้า : 934 คน</h1>
                <h1 class="text-2xl  text-start">จำนวนออเดอร์ : 1,896 ออเดอร์</h1>
            </div>
        </div>
        {!! $chartday->renderHtml() !!}
    </div>
    <div class="tab_content flex-col justify-center text-center" name="weekly">
        <h1 class="text-2xl">{{ $chartweek->options['chart_title'] }}</h1>
        <h1 class="text-sm">วันที่ <?php echo date('d-m-Y', strtotime('-6 days')); ?> ถึง <?php echo date('d-m-Y'); ?></h1>
        <!-- grid div -->
        <div class="grid grid-cols-2 gap-20 px-36 py-5 items-center">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-3xl text-start"> กำไรสุทธิ💰 </h1>
                <h1 class="text-7xl text-start text-green-600 font-bold"> ฿ 109,280 </h1>
                <h1 class="text-xl text-start"> 💹เพิ่มขึ้น 28% จากเมื่อสัปดาห์ที่แล้ว </h1>
            </div>
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-2xl  text-start">รายได้สุทธิ : ฿ 219,280</h1>
                <h1 class="text-2xl  text-start">ยอดลูกค้า : 9,340 คน</h1>
                <h1 class="text-2xl  text-start">จำนวนออเดอร์ : 18,960 ออเดอร์</h1>
            </div>
        </div>
        {!! $chartweek->renderHtml() !!}
    </div>
    <div class="tab_content flex-col justify-center text-center" name="monthly">
        <h1 class="text-2xl">{{ $chartmonth->options['chart_title'] }}</h1>
        <h1 class="text-sm">วันที่ <?php echo date("01-m-Y"); ?> ถึง <?php echo date('d-m-Y'); ?></h1>
        <!-- grid div -->
        <div class="grid grid-cols-2 gap-20 px-36 py-5 items-center">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-3xl text-start"> กำไรสุทธิ💰 </h1>
                <h1 class="text-7xl text-start text-green-600 font-bold"> ฿ 1,092,800 </h1>
                <h1 class="text-xl text-start"> 💹เพิ่มขึ้น 28% จากเมื่อเดือนที่แล้ว </h1>
            </div>
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-2xl  text-start">รายได้สุทธิ : ฿ 2,192,800</h1>
                <h1 class="text-2xl  text-start">ยอดลูกค้า : 93,400 คน</h1>
                <h1 class="text-2xl  text-start">จำนวนออเดอร์ : 189,600 ออเดอร์</h1>
            </div>
        {!! $chartmonth->renderHtml() !!}
        </div>
    </div>
    <div class="tab_content flex-col justify-center text-center" name="yearly">
        <h1 class="text-2xl">{{ $chartyear->options['chart_title'] }}</h1>
        <h1 class="text-sm">วันที่ 01-01-<?php echo date("Y"); ?> ถึง <?php echo date('d-m-Y'); ?></h1>
        <!-- grid div -->
        <div class="grid grid-cols-2 gap-20 px-36 py-5 items-center">
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-3xl text-start"> กำไรสุทธิ💰 </h1>
                <h1 class="text-7xl text-start text-green-600 font-bold"> ฿ 10,928,000 </h1>
                <h1 class="text-xl text-start"> 💹เพิ่มขึ้น 28% จากปีที่แล้ว </h1>
            </div>
            <div class="flex flex-col gap-3 shadow-xl p-5 rounded-2xl bg-white">
                <h1 class="text-2xl  text-start">รายได้สุทธิ : ฿ 21,928,000</h1>
                <h1 class="text-2xl  text-start">ยอดลูกค้า : 934,000 คน</h1>
                <h1 class="text-2xl  text-start">จำนวนออเดอร์ : 1,896,000 ออเดอร์</h1>
            </div>
        </div>
        {!! $chartyear->renderHtml() !!}
    </div>
</div>

<!-- switch content depend on tab -->
@endsection
<!-- connect to contenttab.js -->
@section('javascript')
{!! $chartweek->renderChartJsLibrary() !!}
{!! $chartday->renderJs() !!}
{!! $chartweek->renderJs() !!} 
{!! $chartmonth->renderJs() !!}
{!! $chartyear->renderJs() !!}
<script src="{{ asset('js/contenttab.js') }}"></script>
<script>
    var currentDate = "<?php echo date('Y-m-d'); ?>";
    console.log(currentDate);
</script>




@endsection
