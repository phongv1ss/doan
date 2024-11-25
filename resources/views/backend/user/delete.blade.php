@include('backend.user.component.breadcrumb',['title'=>$config['seo']['create']['title']])



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif




<form action="{{route('user.destroy',$user->id)}}" method="POST" class="box">
    @csrf
    @method('delete')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="pannel-head">
                    <div class="pannel-title" style="
                    font-size: 20px;
                    margin-bottom: 15px;
                    font-weight: 700;
                    color: #1a1a1a;
                     ">Thông Tin Chung</div>
                    <div class="pannel-description" style="
                    font-size: 15px;" 
                    >Thông Tin Người Sử Dụng</div>
                    <p>Bạn muốn xóa thành viên có email là : {{$user->email}} </p>
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
                                            readonly
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
                                            readonly                                     
                                        >
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
      
        <div class="text-right" style="margin-bottom: 20px">
            <button class="btn btn-danger" type="submit" name="send" value="send"> Xóa Thông Tin</button>
        </div>
    </div>
</form>









<style>
    .ibox-content .form-row {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

.form-row label {
    font-weight: bold;
    margin-bottom: 5px;
}

.form-control, .select2-container .select2-selection--single {
    height: 38px; 
    padding: 6px 12px;
    border: 1px solid #ced4da;
    border-radius: 4px;
    background-color: #fff;
    box-sizing: border-box;
}

.select2-container {
    width: 100% !important;
}
.form-control, .select2-container .select2-selection--single {
    height: 38px !important;
    padding: 6px 12px !important;
    border: 1px solid #ced4da !important;
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