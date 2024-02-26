@extends('layouts.staff-layouts')

@section('title', 'Summary')

@section('content')
<div class="flex flex-row gap-3">
    <h1 class="font-extralight text-5xl">ยอดขายภายในร้าน</h1>
</div>

<hr class="my-5">

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
</div>

<!-- create content for each tab -->
<div class="content">
    <div class="tab_content activecontent" name="daily">
        <h1>Hello</h1>
    </div>
    <div class="tab_content" name="weekly">
        <h1>There</h1>
    </div>
    <div class="tab_content" name="monthly">
        <h1>Content 3</h1>
    </div>
</div>

<!-- switch content depend on tab -->

<!-- connect to contenttab.js -->
<script src="{{ asset('js/contenttab.js') }}"></script>

@endsection
