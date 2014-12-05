

$(document).ready(function () {


    $(".myfirstform").validate(
        {
            rules:
            {
                name:"required",
                SDT:{
                    required:true,
                    maxlength:13,
                    minlength:8
                },
                MaKH:"required",
                TenSP:"required",
                NgayNhan:"required",
                NgayTra:"required",
                TenNV:"required",
                TinhTrang:"required",
                email:{email:true},
                cate:"required",
                msg:{required:true, maxlength:1000
                }
            },
            errorClass: "error",
            highlight: function (label) {
                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            messages:{
                name:{
                    required:"  Tên không được để trống"
                },
                SDT:{
                    required:"  Bạn phải nhập số điện thoại",
                    minlength:"  Số điện thoại phải có ít nhất 8 ký tự",
                    maxlength:"  Số điện thoại nhiều nhất có 13 ký tự"
                },
                MaKH:{
                    required:"  Mã khách hàng không được để trống"
                },
                msg:{
                    required:"Bạn phải mô tả lỗi",
                    maxlength:"Không được nhập quá 1000 từ"
                },
                TenSP:{
                    required:"  Tên sản phẩm không được để trống"
                },
                NgayNhan:{
                    required:"Ngày nhận không được để trống"
                },
                NgayTra:{
                    required:"Ngày trả không được để trống"
                },
                TenNV:{
                    required:"Tên nhân viên không được để trống"
                },
                TinhTrang:{
                    required:"Tình trạng không được để trống"
                }
            },
            success: function (label) {
                label
                    .text('OK!').addClass('valid')
                    .closest('.form-group').addClass('has-success');

            }
        }

    );

    $(".accounts").validate(
        {
            rules: {
                username: "required",
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                reppassword: {
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            errorClass: "error",
            highlight: function (label) {
                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            messages: {
                username: "Hãy điền tên đăng nhập.",
                password: {
                    required: "Hãy điền mật khẩu",
                    minlength: "Mật khẩu ít nhất 6 ký tự",
                    maxlength: "Mật khẩu không được quá 20 ký tự"
                },
                reppassword: {
                    equalTo: "Mật khẩu xác nhận không chính xác"
                },
                email: {
                    required: "Hãy nhập 1 địa chỉ email hợp lệ",
                    email:"Địa chỉ email không hợp lệ"
                }
            },
            success: function (label) {
                label
                    .text('OK!').addClass('valid')
                    .closest('.form-group').addClass('has-success');

            }
        }
    );

    $(".singin").validate(
        {
            rules: {
                username: "required",
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                }
            },
            errorClass: "error",
            highlight: function (label) {
                $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            messages: {
                username: "Hãy điền tên đăng nhập.",
                password: {
                    required: "Hãy điền mật khẩu",
                    minlength: "Mật khẩu ít nhất 6 ký tự",
                    maxlength: "Mật khẩu không được quá 20 ký tự"
                }
            },
            success: function (label) {
                label
                    .text('OK!').addClass('valid')
                    .closest('.form-group').addClass('has-success');

            }
        }
    );

});
