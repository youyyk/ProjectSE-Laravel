@extends('welcome')
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
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading text-center">กราฟสรุปจำนวนยอดบิลแต่ละเดือน</div>
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var bill_total =  <?php echo json_encode($bill_total) ?>;
    var barChartData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'จำนวนยอดบิลทั้งหมด (บาท)',
            backgroundColor: "#CAB8FF",
            data: bill_total
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#212121',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'กราฟแท่ง (Bar Chart) ประจำปี 2021'
                },
            }
        });
    };
</script>

@endsection
