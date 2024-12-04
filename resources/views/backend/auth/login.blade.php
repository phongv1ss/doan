<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/logins/login-6/assets/css/login-6.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @flasher_render
    <title>Login Admin</title>
</head>
<body>
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
@endif

<style>
   html, body {
    background-color: #FFFDD0 !important;
    height: 100%; /* Đảm bảo nền bao phủ toàn bộ chiều cao */
    }
   .container {
       background-color: #FFFDD0 !important; /* Màu nền của phần chính */
   }

   .bg-primary {
       background-color: #FFFDD0 !important; /* Đảm bảo đồng bộ màu nền */
   }

   /* CSS cho toast message */
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







    <!-- Login 6 - Bootstrap Brain Component -->
<section class="bg-primary p-3 p-md-4 p-xl-5" >
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
          <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-3 p-md-4 p-xl-5" method="POST">
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="mb-5">
                    <h3>Log in</h3>
                  </div>
                </div>
              </div>
              <form action="{{Route('auth.login')}}" method="POST">
              @csrf
                  <div class="row gy-3 overflow-hidden" >
                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="email" value="{{ old('email') }}" class="form-control" name="email" id="email" placeholder="name@example.com" >
                      <label for="email" class="form-label">Email</label>
                      @if ($errors->has('email'))
                      <span class="error-message">*{{
                      $errors->first('email') }}                        
                      </span>
                       @endif
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-floating mb-3">
                      <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" >
                      <label for="password" class="form-label">Password</label>
                      @if ($errors->has('password'))
                      <span class="error-message">*{{
                        $errors->first('password') }}                    
                      </span>
                    @endif
                    </div>
                  </div>              
                  
                  <div class="col-12">
                    <div class="d-grid">
                      <button class="btn bsb-btn-2xl btn-primary" type="submit">Log In Now</button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-12">
                  <hr class="mt-5 mb-4 border-secondary-subtle">
                  <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                    <a href="{{route('user.dangky')}}" class="link-secondary text-decoration-none">Create new account</a>                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
</body>
</html>

{!! Flasher::render() !!}

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  toastr.option={
    "closeButtun":true,
    "positionClass":"toast-top-right",
    "timeOut":"5000",
    "progressBar":true
  };
    // Khởi tạo Toastr
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>