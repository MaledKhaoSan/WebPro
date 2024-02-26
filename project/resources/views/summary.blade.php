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
    <a class="content_tab" data-content="yearly">
        <h6>ประจำปี</h6>
    </a>
</div>

<!-- create content for each tab -->
<div class="content">
    <div class="tab_content activecontent" name="daily">
    <h1>{{ $chartday->options['chart_title'] }}</h1>
        {!! $chartday->renderHtml() !!}
    </div>
    <div class="tab_content" name="weekly">
        <h1>{{ $chartweek->options['chart_title'] }}</h1>
        {!! $chartweek->renderHtml() !!}
    </div>
    <div class="tab_content" name="monthly">
        <h1>{{ $chartmonth->options['chart_title'] }}</h1>
        {!! $chartmonth->renderHtml() !!}
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
<script src="{{ asset('js/contenttab.js') }}"></script>

@endsection
