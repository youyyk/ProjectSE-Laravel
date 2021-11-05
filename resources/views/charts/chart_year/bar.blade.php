@extends('charts.chartHeader')

@section('chart-section')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var bill_total =  <?php echo json_encode($bill_total) ?>;
    var groupDate =  <?php echo json_encode($groupDate) ?>;
    var barChartData = {
        labels: groupDate,
        datasets: [{
            label: 'จำนวนยอดชำระทั้งหมด (บาท)',
            backgroundColor: "#FFBCBC",
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
                    text: 'ประจำปี 2021'
                },
            }
        });
    };
</script>
@endsection
