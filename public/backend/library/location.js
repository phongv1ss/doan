(function($){
    "use strict";
    var HT = {};
   
    HT.getLocation = () => {
        // Sửa selector để bắt sự kiện cho cả province và districts
        $(document).on('change', '.location', function(){
            let _this = $(this);
            let option = {
                'data': {
                    'location_id': _this.val(),
                },
                'target': _this.attr('data-target')
            };
            
            // Chỉ gửi ajax nếu giá trị được chọn khác 0
            if(_this.val() != '0') {
                HT.sendDataTogetLocation(option);
            } else {
                // Reset dropdown con nếu chọn giá trị mặc định
                $('.' + option.target).html('<option value="0">Chọn ' + 
                    (option.target === 'districts' ? 'Quận/Huyện' : 'Phường/Xã') + 
                '</option>');
            }
        });
    }

    HT.sendDataTogetLocation = (option) => {
        $.ajax({
            url: 'ajax/location/getLocation',
            type: 'GET',
            data: option,
            dataType: 'json',
            success: function(res){
                $('.' + option.target).html(res.html);
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log('Lỗi: ' + textStatus + ' ' + errorThrown);
            }
        });
    }

    $(document).ready(function(){
        HT.getLocation();
    });
})(jQuery);