


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
$url=($config['method']=='dangky')? route('user.register'):'';
@endphp




<form action="{{ $url }}" method="POST" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title" style="
                    font-size: 25px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                     ">Form Đăng Ký</div>
                    <div class="pannel-title" style="
                    font-size: 20px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                     ">Thông Tin Chung</div>
                    <div class="pannel-description" style="
                    font-size: 15px;" 
                    >Thông Tin Người Sử Dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông Tin Chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Email
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="email"
                                            value="{{ old('email', ($user->email) ?? '') }}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Họ Tên
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="name"
                                            value="{{ old('name', ($user->name) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"                                        
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        @php
                        $userCatalogue=[
                            'Chọn Vai Trò',
                            'Quản Trị Viên',
                            'Cộng Tác Viên'
                        ];
                        @endphp
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Vai Trò
                                        <span class="text-danger">(*)</span>
                                        <select name="user_catalogue_id" id="" class="form-control" style="height: 38px;width: 320px; setupSelect2">
                                           @foreach ($userCatalogue as $key => $item)
                                            <option {{$key == old('user_catalogue_id',(isset($user->user_catalogue_id)) ?
                                            $user->user_catalogue_id : '') ? 'selected': ''}}
                                            
                                            value="{{$key}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Ngày Sinh                                       
                                        <input
                                            type="date"
                                            name="birthday"
                                            value="{{ old('birthday', (isset($user->birthday)) ? date('Y-m-d',strtotime($user->birthday)): '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Mật Khẩu
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="password"
                                            name="password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Nhập Lại Mật Khẩu
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="password"
                                            name="re_password"
                                            value=""
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"                                        
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
        <hr >
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title" style="
                    font-size: 20px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                    "
                    >Thông Tin Liên Hệ</div>
                    <div class="pannel-description" style="
                    font-size: 15px;"
                    >Thông Tin Liên Hệ Người Sử Dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Thông Tin Chung</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Thành Phố
                                       <select name="provice_id" class="form-control setupSelect2 province location" data-target="districts">
                                        <option value="0">Chọn Thành Phố</option>
                                        @if(isset($provinces))
                                            @foreach($provinces as $province)
                                            <option @if(old('provice_id')==$province->code) selected @endif
                                             value="{{$province->code}}">{{$province->name}}</option>
                                            @endforeach
                                        @endif
                                       </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Quận
                                        <select name="district_id" class="form-control setupSelect2 districts location" data-target="wards">
                                            <option  value="0">Chọn Quận/Huyện</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Phường
                                        <select name="ward_id" class="form-control setupSelect2 wards ">
                                            <option value="0">Chọn Phường/Xã</option>
                                           
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Địa Chỉ                                      
                                        <input
                                            type="text"
                                            name="address"
                                            value="{{ old('address', ($user->address) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label">Số Điện Thoại
                                        <span class="text-danger">(*)</span>
                                        <input
                                            type="text"
                                            name="phone"
                                            value="{{ old('phone', ($user->phone) ?? '')}}"
                                            class="form-control"
                                            placeholder=""
                                            autocomplete="off"
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>                                      
                </div>
            </div>
        </div>
        <div class="text-right" style="margin-bottom: 20px">
            <a href="{{ route('auth.login') }}" class="btn btn-secondary">Quay Lại Đăng Nhập</a>

            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu Thông Tin</button>
        </div>
    </div>
</form>









<style>
/* Tổng thể */
button.btn-secondary, a.btn-secondary {
    background-color: #6c757d;
    border: 1px solid #6c757d;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    padding: 8px 20px;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

button.btn-secondary:hover, a.btn-secondary:hover {
    background-color: #5a6268;
    box-shadow: 0 4px 6px rgba(108, 117, 125, 0.3);
}

body {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    line-height: 1.6;
    background-color: #FFFDD0; /* Màu nền kem */
    color: #333;
    margin: 0;
    padding: 0;
}

/* Header và Breadcrumb */
.breadcrumb {
    background-color: #fff;
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
    font-size: 14px;
    font-weight: 500;
    color: #555;
}

.breadcrumb a {
    color: #787b7e;
    text-decoration: none;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

/* Khối chứa nội dung */
.wrapper-content {
    padding: 20px;
}

/* Tiêu đề Panel */
.pannel-head {
    margin-bottom: 20px;
}

.pannel-title {
    font-size: 18px;
    margin-bottom: 5px;
    font-weight: 600;
    color: #007bff;
}

.pannel-description {
    font-size: 14px;
    color: #666;
}

/* Card (ibox) */
.ibox {
    background: #fff;
    border: 1px solid #e7eaec;
    border-radius: 5px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.ibox-title {
    padding: 10px 20px;
    background-color: #79e9aa;
    color: #fff;
    font-weight: 600;
    border-bottom: 1px solid #ddd;
    border-radius: 5px 5px 0 0;
}

.ibox-content {
    padding: 20px;
}

/* Form */
.form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-row label {
    font-weight: 500;
    color: #444;
    margin-bottom: 5px;
}

.form-control {
    height: 38px;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Select2 Styles */
.select2-container {
    width: 100% !important;
}

.select2-container .select2-selection--single {
    height: 38px;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.select2-container .select2-selection--single:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Nút */
button.btn-primary {
    background-color: #007bff;
    border: 1px solid #007bff;
    border-radius: 4px;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    padding: 8px 20px;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
}

button.btn-primary:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 6px rgba(0, 123, 255, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
    .ibox-content {
        padding: 15px;
    }

    .pannel-title {
        font-size: 16px;
    }

    .form-control {
        height: 36px;
        font-size: 14px;
    }

    button.btn-primary {
        font-size: 12px;
        padding: 6px 16px;
    }
}





</style>



<script>
    $(document).ready(function() {
        $('.setupSelect2').select2();
    });

    var province_id='{{ (isset($user->provice_id)) ? $user->provice_id :old('province_id') }}'
    var district_id='{{ (isset($user->district_id)) ? $user->district_id :old('district_id') }}'
    var ward_id='{{ (isset($user->ward_id)) ? $user->ward_id :old('ward_id') }}'

   
</script>