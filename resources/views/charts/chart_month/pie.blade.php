{{--@extends('welcome')--}}
{{--@section('content')--}}

{{--    <div class="container">--}}
{{--        <h1 class="mt-3">--}}
{{--            กราฟรายเดือน--}}
{{--            <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">--}}
{{--            <span class="btn-group me-2" role="group" aria-label="Second group">--}}
{{--                <button type="button" class="btn btn-outline-dark ">--}}
{{--                    <a href="{{route("day.line")}}" style="text-decoration:none" class="link-dark">--}}
{{--                วัน</a>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-outline-dark ">--}}
{{--                    <a href="{{route("month.line")}}" style="text-decoration:none" class="link-dark">--}}
{{--                เดือน</a>--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-outline-dark ">--}}
{{--                    <a href="{{route("year.line")}}" style="text-decoration:none" class="link-dark">--}}
{{--                ปี</a>--}}
{{--                </button>--}}

{{--                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                    ประเภทกราฟ--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                    <a class="dropdown-item" href="{{route("month.bar")}}">Bar</a>--}}
{{--                    <a class="dropdown-item" href="{{route("month.pie")}}">Pie</a>--}}
{{--                </div>--}}
{{--            </span>--}}
{{--        </span>--}}
{{--        </h1>--}}
{{--        <hr>--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-10 offset-md-1">--}}
{{--                <div class="panel panel-default">--}}
{{--                    <div class="panel-heading text-center">กราฟสรุปจำนวนยอดบิลแต่ละเดือน</div>--}}
{{--                    <div id="pie-chart" style="width: 900px; height: 500px"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--        <script type="text/javascript">--}}
{{--            google.charts.load('current', {'packages':['corechart']});--}}
{{--            google.charts.setOnLoadCallback(drawChart);--}}

{{--            function drawChart() {--}}

{{--                var bill_total = google.visualization.arrayToDataTable([--}}
{{--                    ['Month Name', 'Registered User Count'],--}}

{{--                    @php--}}
{{--                        foreach($pie as $d) {--}}
{{--                            echo "['".$d->month_name."', ".$d->total."],";--}}
{{--                        }--}}
{{--                    @endphp--}}
{{--                ]);--}}

{{--                var options = {--}}
{{--                    title: 'Users Detail',--}}
{{--                    is3D: false,--}}
{{--                };--}}

{{--                var chart = new google.visualization.PieChart(document.getElementById('/monthPie'));--}}

{{--                chart.draw(bill_total, options);--}}
{{--            }--}}
{{--        </script>--}}
{{--@endsection--}}
