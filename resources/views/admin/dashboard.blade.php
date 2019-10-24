@extends('admin.master')

@section('title', 'Sunodia ~ Dashboard')

@section('content')
    @component('admin.components.content')
        @slot('title', 'Dashboard')
        <div class="layer w-100 p-20"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="line-chart" height="151" style="display: block; width: 568px; height: 151px;" width="568" class="chartjs-render-monitor"></canvas>
        </div>
        <div class="layer bdT p-20 w-100">
            <div class="peers ai-c jc-c gapX-20">
                <div class="peer"><span class="fsz-def fw-600 mR-10 c-grey-800">10% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">APPL</small></div>
                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">2% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Average</small></div>
                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">15% <i class="fa fa-level-up c-green-500"></i></span> <small class="c-grey-500 fw-600">Sales</small></div>
                <div class="peer fw-600"><span class="fsz-def fw-600 mR-10 c-grey-800">8% <i class="fa fa-level-down c-red-500"></i></span> <small class="c-grey-500 fw-600">Profit</small></div>
            </div>
        </div>
    @endcomponent
@endsection