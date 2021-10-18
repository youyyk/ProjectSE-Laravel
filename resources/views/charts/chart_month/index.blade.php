@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


    <div class="container">
        <h1 class="mt-3">
            กราฟรายเดือน
            <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <span class="btn-group me-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-dark ">
                    <a href="{{route("charts.index")}}" style="text-decoration:none" class="link-light">
                        ย้อนกลับ</a>
                </button>

                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ประเภทกราฟ
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route("month.line")}}">กราฟเส้น</a>
                    <a class="dropdown-item" href="{{route("month.bar")}}">กราฟแท่ง</a>
                </div>
            </span>
        </span>
        </h1>
        <hr>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <figure class="highcharts-figure">
        <div id="container"></div>
            <p class="highcharts-description">
            </p>
    </figure>

    <script type="text/javascript">
        var bill_total =  <?php echo json_encode($bill_total) ?>;

        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'กราฟสรุปจำนวนยอดบิลแต่ละเดือน'
            },
            subtitle: {
                text: 'กราฟเส้น (Line Chart) ประจำปี 2021'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'จำนวนยอดบิลทั้งหมด (บาท)'
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
