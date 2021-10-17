@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


<div class="container">
    <h1 class="mt-3">
        กราฟรายวัน
        <span class="float-end dropdown btn-toolbar mt-3" role="toolbar" aria-label="Toolbar with button groups">
            <span class="btn-group me-2" role="group" aria-label="Second group">
                <button type="button" class="btn btn-outline-dark ">
                    <a href="{{route("day.line")}}" style="text-decoration:none" class="link-dark">
                วัน</a>
                </button>
                <button type="button" class="btn btn-outline-dark ">
                    <a href="{{route("month.line")}}" style="text-decoration:none" class="link-dark">
                เดือน</a>
                </button>
                <button type="button" class="btn btn-outline-dark ">
                    <a href="{{route("year.line")}}" style="text-decoration:none" class="link-dark">
                ปี</a>
                </button>

            <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ประเภทกราฟ
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route("day.bar")}}">Bar</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
            </span>
        </span>
    </h1>
    <div class="dropdown">

    </div>
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
            text: 'กราฟสรุปจำนวนยอดบิลแต่ละวัน'
        },
        subtitle: {
            text: 'กราฟเส้น (Line Chart) ประจำปี 2021'
        },
        xAxis: {
            categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
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
        // plotOptions: {
        //     line: {
        //         dataLabels: {
        //             enabled: true
        //         },
        //         enableMouseTracking: false
        //     }
        // },
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