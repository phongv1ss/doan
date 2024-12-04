<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="400" height="100"></canvas>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Monthly</span>
                    <h5>Total Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalOrders }}</h1>
                    <small>Total number of orders</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Monthly</span>
                    <h5>Total Revenue</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ number_format($totalRevenue)}} VND</h1>
                    <small>Total revenue from orders</small>
                </div>
            </div>
        </div>
    </div>
    
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                    <div class="pull-right">
                        <div class="row">
                            <div class="col-lg-12">
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>      
        </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = {
        labels: @json($months), 
        datasets: [
            {
                label: 'Doanh thu (VND)',
                data: @json($salesData),
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                borderWidth: 1,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'rgb(0, 0, 0)',
            },
        ]
    };

    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        usePointStyle: true,
                    },
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tháng'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Doanh thu (VND)'
                    },
                    min: 0, 
                    max: 5000000, 
                    ticks: {
                        stepSize: 1000000, 
                        callback: function(value) {
                            return value.toLocaleString('vi-VN') + ' VND'; 
                        }
                    }
                }
            }
        }
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

