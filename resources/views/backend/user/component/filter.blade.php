<form action="{{ route('user.index')}}">
    <div class="filter">                   
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            <div class="perpage">
                <div class="action" >
                    <div class="uk-flex uk-flex-middle" >
                            <select name="publish" class="form-control mr10 setupSelect2" style="margin-bottom: 4px;height: 40px!important;">
                                <option value="-1" selected="selected" style="">Chọn tình trạng</option>
                                <option value="1"> Quản Trị Viên</option>  
                                <option value="0"> Thành Viên</option>                                 
                            </select>                                        
                            <div class="input-group">
                                <input type="text" name="keyword" value="{{ request('keyword')?: old('keyword') }}" placeholder="nhập từ khóa bạn muốn tìm kiếm.."
                                class="form-control" style="width: 300px; margin-bottom: 4px;height: 40px!important;">
                                <span class="input-group-btn">
                                    <button type="submit" name="sreach" value="sreach"
                                    class="btn btn-primary mb0 btn-sm" style="height: 40px!important;"> Tìm Kiếm 
                                    </button>  
                                                            
                                </span>                                           
                            </div>
                            <a href="{{ route('user.create') }}" class="btn btn-danger" style="font-size:12px;height: 40px;margin-left: 1em; align-items: center;padding: 5px 10px;magin:0px 0px 5px -1px;"><i class="fa fa-plus"></i>Thêm Thành Viên </a>
                        </div>                            
                    </div>   
                </div>
            </div>
        </div>                  
    </div>
</form>


<script>
    $(document).ready(function() {
       $('.setupSelect2').select2();
   });

</script>
<style>

.select2-container .select2-selection--single {
    height: 40px !important; 
    margin-bottom: 4px;
    border-radius: 4px; 
    border: 1px solid #ddd; 
}


.select2-container .select2-selection__arrow {
    top: 40% !important;

    transform: translateY(-50%);
}

.select2-container .select2-selection__rendered {
    padding: 0 10px !important;
  
}

</style>


<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
