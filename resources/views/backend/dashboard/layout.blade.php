<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.component.head')
</head>


<body>
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
        }, 300); 
    </script>
    <style>
        .toast-message {
           position: fixed;
           bottom: 20px;
           right: 20px;
           padding: 15px 20px;
           background-color: #7feea0; /* Màu nền đỏ */
           color: #fff; /* Màu chữ trắng */
           border-radius: 5px;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
           opacity: 1;
           transition: opacity 0.5s ease;
           z-index: 1000; /* Đảm bảo luôn hiện trên cùng */
       }
    </style>
@endif
@if (session('saitt'))
    <div class="toast-message" id="saitt-toast">
        {{ session('saitt') }}
    </div>

    <script>
        
        setTimeout(function() {
            var toast = document.getElementById('saitt-toast');
            if (toast) {
                toast.style.opacity = '0'; 
                setTimeout(function() {
                    toast.style.display = 'none';
                }, 500); 
            }
        }, 3000); 
    </script>
    <style>
        .toast-message {
       position: fixed;
       bottom: 20px;
       right: 20px;
       padding: 15px 20px;
       background-color: #f44336; /* Màu nền đỏ */
       color: #fff; /* Màu chữ trắng */
       border-radius: 5px;
       box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
       opacity: 1;
       transition: opacity 0.5s ease;
       z-index: 1000; /* Đảm bảo luôn hiện trên cùng */
   }
    </style>
@endif

    <div id="wrapper">
        @include('backend.dashboard.component.sidebar')
        

        <div id="page-wrapper" class="gray-bg">
            @include('backend.dashboard.component.nav')
            @include($template)
            @include('backend.dashboard.component.footer')
        </div>
    </div>

    @include('backend.dashboard.component.script')
</body>
</html>
