@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


    <div class="container">
        <h1 class="mt-3">
            กราฟรายปี
            <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <span class="btn-group me-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-light ">
                    <a href="{{route("day.line")}}" style="text-decoration:none" class="link-dark">
                วัน</a>
                </button>
                <button type="button" class="btn btn-light ">
                    <a href="{{route("month.line")}}" style="text-decoration:none" class="link-dark">
                เดือน</a>
                </button>
                <button type="button" class="btn btn-dark ">
                    <a href="{{route("year.bar")}}" style="text-decoration:none" class="link-light">
                ปี</a>
                </button>

                <button class="btn btn-warning dropdown-toggle border border-dark" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    กราฟเส้น
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route("year.line")}}">กราฟเส้น</a>
                    <a class="dropdown-item" href="{{route("year.bar")}}">กราฟแท่ง</a>
                </div>
            </span>
            <button type="button" class="btn btn-primary">
                <a href="{{route("todayTotal")}}" style="text-decoration:none" class="link-light">
                    ยอดประจำวันนี้
                </a>
            </button>

            <span class=" btn-group px-2" role="group" aria-label="Third group">
                <button type="button" class="btn btn-secondary">
                <a href="{{route("charts.index")}}" style="text-decoration:none" class="link-light">
                    ย้อนกลับ</a>
                </button>
            </span>
        </span>
        </h1>
        <div class="dropdown">

        </div>
        <hr>
{{--        ------{{count($groupDate)}}--}}
{{--        <div>{{$bill_total}}</div>--}}
{{--        <div>{{$groupDate}}</div>--}}
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure m-auto" style="width: 60%">
        <div id="container"></div>
            <p class="highcharts-description">

            </p>
    </figure>

    <script type="text/javascript">
        var bill_total =  <?php echo json_encode($bill_total) ?>;
        var groupDate =  <?php echo json_encode($groupDate) ?>;

        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'กราฟสรุปจำนวนยอดบิลแต่ละปี'
            },
            subtitle: {
                text: 'กราฟเส้น (Line Chart)'
            },
            xAxis: {
                categories: groupDate
            },
            yAxis: {
                title: {
                    text: 'จำนวนยอดชำระทั้งหมด (บาท)'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'ยอดทั้งหมดที่ได้รับ (บาท) ',
                data: bill_total
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>


@endsection
