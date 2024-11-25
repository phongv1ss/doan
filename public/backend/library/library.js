(function ($) {
    "use strict";
    var HT = {};
    var _token =$('meta[name="csrf-token"]').attr('content');


    HT.switchery = () => {
       
        $('.switchery').remove();

        
        $('.js-switch').each(function () {
            if (!$(this).next().hasClass('switchery')) { 
                new Switchery(this, { color: '#1AB394' });
            }
        });
    };

  
    HT.select2 = () => {
        $('.setupSelect2').select2();
    };

    HT.changeStatus = () => {
        if ($('.status').length) {
            $(document).on('change', '.status', function (e) {
                e.preventDefault();
    
                // Lấy URL gốc của ứng dụng
                let baseUrl = window.location.origin;
    
                // Tạo dữ liệu cần gửi lên server
                let option = {
                    value: $(this).val(),
                    modelId: $(this).data('modelid'),
                    model: $(this).data('model'),
                    field: $(this).data('field'),
                    _token: $('meta[name="csrf-token"]').attr('content'),
                };
    
                
                $.ajax({
                    url: '/test1/public/ajax/dashboard/changeStatus',
                    type: 'POST',
                     data: option,
                     dataType: 'json',
                     success: function (res) {
                     if (res.flag) {
                         alert('Trạng thái được cập nhật thành công!');
                     } else {
                         alert('Cập nhật thất bại.');
                        }
                    },
                     error: function (jqXHR, textStatus, errorThrown) {
                     console.error('Lỗi: ' + textStatus + ' ' + errorThrown);
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau!');
                     }
                });
            });
        }
    };
    
    HT.checkAll = () => {
        if ($('#checkAll').length) {
            // Khi click vào checkbox chính (checkAll)
            $(document).on('click', '#checkAll', function () {
                let isChecked = $(this).prop('checked'); // Lấy trạng thái của checkbox chính
                $('.checkboxItem').prop('checked', isChecked); // Đặt trạng thái cho tất cả checkbox con
    
                if (isChecked) {
                    $('tbody tr').addClass('active-bg'); // Thêm lớp nền nếu chọn tất cả
                } else {
                    $('tbody tr').removeClass('active-bg'); // Xóa lớp nền nếu bỏ chọn tất cả
                }
            });
    
            // Khi click vào từng checkbox trong hàng
            $(document).on('click', '.checkboxItem', function () {
                let parentTr = $(this).closest('tr'); // Lấy hàng cha chứa checkbox
                let allChecked = parentTr.find('.checkboxItem:checked').length > 0; // Kiểm tra có checkbox nào được chọn không
    
                if (allChecked) {
                    parentTr.addClass('active-bg'); // Thêm lớp nền cho hàng
                } else {
                    parentTr.removeClass('active-bg'); // Xóa lớp nền nếu bỏ chọn
                }
    
                // Cập nhật trạng thái của checkbox chính (checkAll)
                let totalCheckbox = $('.checkboxItem').length; // Tổng số checkbox
                let checkedCount = $('.checkboxItem:checked').length; // Số checkbox đã được chọn
                $('#checkAll').prop('checked', totalCheckbox === checkedCount); // Nếu tất cả được chọn, thì checkAll cũng được chọn
            });
        }
    };
    
    

    
   $(document).ready(function () {
        HT.switchery();
        HT.select2();
        HT.changeStatus();
        HT.checkAll();
    });

    
    $(document).on('ajaxComplete', function () {
        HT.switchery();
    });

})(jQuery);
