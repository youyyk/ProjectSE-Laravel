@extends("welcome")

@section("content")
<div class="container">
    <h1 class="mt-3">

        <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <span class="btn-group me-2" role="group" aria-label="Second group">
                <a href="{{route("charts.day")}}" style="text-decoration:none" class="link-dark">
                    <button type="button" class="btn @if(\Request::routeIs('charts.day')) btn-dark link-light @else btn-light link-dark @endif ">
                        วัน
                    </button>
                </a>
                <a href="{{route("charts.month")}}" style="text-decoration:none" class="link-dark">
                    <button type="button" class="btn @if(\Request::routeIs('charts.month')) btn-dark link-light @else btn-light link-dark @endif ">
                        เดือน
                    </button>
                </a>
                <a href="{{route("charts.year")}}" style="text-decoration:none" class="link-light">
                <button type="button" class="btn @if(\Request::routeIs('charts.year')) btn-dark link-light @else btn-light link-dark @endif ">
                    ปี
                </button>
                </a>
            </span>
            <button type="button" class="btn btn-primary">
                <a href="{{route("todayTotal")}}" style="text-decoration:none" class="link-light">
                    ส่งยอดประจำวันนี้
                </a>
            </button>
        </span>
    </h1>

    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        @if(\Request::routeIs('charts.day'))
                            กราฟสรุปจำนวนยอดบิลแต่ละวัน
                        @elseif(\Request::routeIs('charts.month'))
                            กราฟสรุปจำนวนยอดบิลแต่ละเดือน
                        @elseif(\Request::routeIs('charts.year'))
                            กราฟสรุปจำนวนยอดบิลแต่ละปี
                        @endif
                    </div>
                    <div class="panel-body">
                        <canvas id="canvas" height="280" width="600"></canvas>
                    </div>
                </div>
            </div>
        </div>
    <div>
        @yield("chart-section")
    </div>
</div>
@endsection
