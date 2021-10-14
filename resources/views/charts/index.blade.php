@extends('welcome')

@section('content')

<div class="container">
    <h1 class="mt-3">
        กราฟสรุปยอด
    </h1>
    <hr>
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
{{--    <p class="highcharts-description">--}}
{{--        This chart shows how data labels can be added to the data series. This--}}
{{--        can increase readability and comprehension for small datasets.--}}
{{--    </p>--}}
</figure>

<script type="text/javascript">
    var bill_total =  <?php echo json_encode($bill_total) ?>;

    Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'กราฟสรุปจำนวนยอดแต่ละเดือน'
        },
        subtitle: {
            text: 'ประจำปี 2564'
        },
        xAxis: {
            // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            categories: ['Oct', 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
            // categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20','21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
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
            name: 'ยอดทั้งหมดที่ได้รับ',
            // data: [
            //     12598
            // ]
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
