@extends('welcome')
@inject('billController', 'App\Http\Controllers\BillController')
@section('content')


<div class="container">
{{--    <h1 class="mt-3">--}}
{{--        กราฟสรุปยอดบิล--}}
{{--    </h1>--}}
{{--    <hr>--}}
{{--</div>--}}
{{--<script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--<script src="https://code.highcharts.com/modules/accessibility.js"></script>--}}

{{--<figure class="highcharts-figure">--}}
{{--    <div id="container"></div>--}}
{{--    <p class="highcharts-description">--}}
{{--        This chart shows how data labels can be added to the data series. This--}}
{{--        can increase readability and comprehension for small datasets.--}}
{{--    </p>--}}
{{--</figure>--}}

{{--<script type="text/javascript">--}}
{{--    var bill_total =  <?php echo json_encode($bill_total) ?>;--}}

{{--    Highcharts.chart('container', {--}}
{{--        chart: {--}}
{{--            type: 'line'--}}
{{--        },--}}
{{--        title: {--}}
{{--            text: 'กราฟสรุปจำนวนยอดแต่ละเดือน'--}}
{{--        },--}}
{{--        subtitle: {--}}
{{--            text: 'ประจำปี 2564'--}}
{{--        },--}}
{{--        xAxis: {--}}
{{--            // categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']--}}
{{--            categories: ['Oct', 'Nov', 'Dec','Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']--}}
{{--            // categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20','21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']--}}
{{--        },--}}
{{--        yAxis: {--}}
{{--            title: {--}}
{{--                text: 'จำนวนยอดบิลทั้งหมด (บาท)'--}}
{{--            }--}}
{{--        },--}}
{{--        legend: {--}}
{{--            layout: 'vertical',--}}
{{--            align: 'right',--}}
{{--            verticalAlign: 'middle'--}}
{{--        },--}}
{{--        plotOptions: {--}}
{{--            series: {--}}
{{--                allowPointSelect: true--}}
{{--            }--}}
{{--        },--}}
{{--        // plotOptions: {--}}
{{--        //     line: {--}}
{{--        //         dataLabels: {--}}
{{--        //             enabled: true--}}
{{--        //         },--}}
{{--        //         enableMouseTracking: false--}}
{{--        //     }--}}
{{--        // },--}}
{{--        series: [{--}}
{{--            name: 'ยอดทั้งหมดที่ได้รับ',--}}
{{--            // data: [--}}
{{--            //     12598--}}
{{--            // ]--}}
{{--            data: bill_total--}}
{{--        }],--}}
{{--        responsive: {--}}
{{--            rules: [{--}}
{{--                condition: {--}}
{{--                    maxWidth: 500--}}
{{--                },--}}
{{--                chartOptions: {--}}
{{--                    legend: {--}}
{{--                        layout: 'horizontal',--}}
{{--                        align: 'center',--}}
{{--                        verticalAlign: 'bottom'--}}
{{--                    }--}}
{{--                }--}}
{{--            }]--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

    <hr>
    <h1 class="mt-3">
        รายการบิล
        <span class="float-end">
            <a href="{{route("bills.create")}}">
                <button type="button" class="btn btn-primary">
                    + เพิ่มบิล
                </button>
            </a>
        </span>
    </h1>
    <hr>
    <table class="table border-2 mt-3">
        <thead>
        <tr>
            <th class="border-2">#</th>
            <th class="border-2">Total</th>
            <th class="border-2">Status</th>
            <th class="border-2">User (Relation)</th>
            <th class="border-2">Restable (Relation)</th>
            <th class="border-2">Menus (Relation)</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bills as $bill)
            <tr>
                <td class="border-2 p-0.5">
                    <a href="{{route('bills.show',['bill'=>$bill->id])}}" class="text-info">
                        {{$bill->id}}
                    </a>
                </td>
                <td class="border-2 p-0.5">{{$bill->total}}</td>
                <td class="border-2 p-0.5">
                    @if($bill->status==1)
                        <span class="badge rounded-pill bg-success">
                            {{"ว่าง"}}
                            {{--{{$resTable->status==1?"ว่าง":"ไม่ว่าง"}}--}}
                        </span>
                    @else
                        <span class="badge rounded-pill bg-danger">
                            {{"ไม่ว่าง"}}
                        </span>
                    @endif
                </td>

                <td class="border-2 p-0.5">{{$bill->user->name}}</td>
                <td class="border-2 p-0.5">{{$bill->resTable->id}}</td>
                <td class="border-2 p-0.5">
                    @foreach($bill->menus as $menu)
                        <div>
                            {{ $menu->name}}
                        </div>
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
