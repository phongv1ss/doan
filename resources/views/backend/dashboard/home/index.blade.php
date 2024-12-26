<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart" width="400" height="100"></canvas>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Tổng</span>
                    <h5>Sản phẩm</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalProducts }}</h1>
                    <small>Tổng số sản phẩm</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Tổng</span>
                    <h5>Người dùng</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalUsers }}</h1>
                    <small>Tổng số người dùng</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Tổng</span>
                    <h5>Đơn hàng</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $totalOrders }}</h1>
                    <small>Tổng số đơn hàng</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm đoạn này để debug -->
    @if(isset($topProducts))
        <div style="display: none;">
            Debug Data: {{ print_r($topProducts, true) }}
        </div>
    @endif

    <!-- Chi tiết sản phẩm bán chạy -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Top 5 Sản phẩm bán chạy</h5>
                </div>
                <div class="ibox-content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th class="text-right">Số lượng đã bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($topProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-right">{{ number_format($product->total_sold) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Debug data
    console.log('Top Products Data:', {!! json_encode($topProducts) !!});

    const ctx = document.getElementById('pieChart');
    
    // Data cho biểu đồ tròn
    const pieData = {
        labels: {!! json_encode($topProducts->pluck('name')) !!},
        datasets: [{
            data: {!! json_encode($topProducts->pluck('total_sold')) !!},
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0',
                '#9966FF'
            ],
            borderWidth: 1
        }]
    };

    // Cấu hình biểu đồ
    const pieConfig = {
        type: 'pie',
        data: pieData,
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || 0;
                            return `${label}: ${value} sản phẩm`;
                        }
                    }
                }
            }
        }
    };

    // Tạo biểu đồ
    new Chart(ctx, pieConfig);
});
</script>
@endpush

@if (session('demo'))
    <div class="toast-message" id="demo-toast">
        {{ session('demo') }}
    </div>

    <script>
        
        setTimeout(function() {
            var toast = document.getElementById('demo-toast');
            if (toast) {
                toast.style.opacity = '0'; 
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 500); 
            }
        }, 3000); 
    </script>
@endif
<style>
    .toast-message {
       position: fixed;
       bottom: 20px;
       right: 20px;
       padding: 15px 20px;
       background-color: #36f46f; /* Màu nền đỏ */
       color: #fff; /* Màu chữ trắng */
       border-radius: 5px;
       box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
       opacity: 1;
       transition: opacity 0.5s ease;
       z-index: 1000; /* Đảm bảo luôn hiện trên cùng */
   }
</style>