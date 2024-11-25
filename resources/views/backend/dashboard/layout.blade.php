<!DOCTYPE html>
<html>

<head>
    @include('backend.dashboard.component.head')
</head>

<body>
   
    <div class="alert alert-success" id="success-alert">
        {{ session('demo') }}
    </div>
    
    <script>
        
        setTimeout(function() {
            var alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.display = 'none';
            }
        }, 3000); 
    </script>

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
