<?php
include "database.php";
$Ma_BH = $_REQUEST['id'];
$sql = "Select * from guaranteed where Ma_BH = '$Ma_BH'";
$BaoHanh = $pdo -> query($sql);
$BaoHanh=$BaoHanh -> fetch();
$date = new DateTime($BaoHanh['NgayNhan_SP']);
$result = $date->format('d/m/Y');
$date1 = new DateTime($BaoHanh['NgayTra_SP']);
$result1 = $date1->format('d/m/Y');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta property=”fb:app_id” content=”1001744079842336″/>
    <meta property=”fb:admins” content=”100008042711840″/>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" type="text/css"/>
    <link rel="stylesheet" href="css/bootstrap-select.css" type="text/css"/>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.json-2.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/locales/bootstrap-datepicker.vi.js"></script>
    <script src="js/DatepickerJavaScript.js"></script>

    <style>
        .fb-comments, .fb-comments span, .fb-comments iframe { width: 100% !important; }
    </style>
</head>
<body>
<div class="well well-sm" style="text-align:center">
    <h3> Bảo Hành Máy tính</h3>
</div>
<div class="col-sm-offset-1 row">
    <div class="pull-left col-sm-5 customerTT">
        <h3>Thông tin sản phẩm</h3>
        <hr>
        <form class="myfirstform" action="modify.php?id=<?php echo $Ma_BH ?>" method="post">
            <div class="form-group">
                Tên khách hàng: <label class="control-label"><?php echo $BaoHanh['Ten_KH'] ?></label>
            </div>

            <div class="form-group">
                Số điện thoại: <label class="control-label"><?php echo $BaoHanh['DienThoai_KH'] ?></label>
            </div>

            <div class="form-group">
                Địa chỉ Email: <label class="control-label"><?php echo $BaoHanh['Email'] ?></label>
            </div>

            <div class="form-group ">
                Mã số khách hàng: <label class="control-label"><?php echo $BaoHanh['Ma_KH'] ?></label>
            </div>

            <div class="form-group ">
                Tên sản phẩm: <label class="control-label"><?php echo $BaoHanh['Ten_SP'] ?></label>
            </div>
            <div class="form-group ">
                Mô tả về lỗi: <label class="control-label"><?php echo $BaoHanh['MoTaLoi'] ?></label>
            </div>

            <div class="form-group ">
                Ngày nhận sản phẩm: <label class="control-label"><?php echo $result ?></label>
            </div>

            <div class="form-group ">
                Ngày dự kiến trả: <label class="control-label"><?php echo $result1 ?></label>
            </div>

            <div class="form-group ">
                Tên nhân viên sửa: <label class="control-label"><?php echo $BaoHanh['NhanVienSua'] ?></label>
            </div>

            <div class="form-group ">
                Tình trạng: <label class="control-label"><?php echo $BaoHanh['TinhTrang'] ?></label>
            </div>
            <div class="controls pull-left">
                <a href="index.php" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-home"></span></a>
            </div>
        </form>
    </div>
    <div class=" col-sm-5 customerCMT" style="margin-left: 20px">
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1001744079842336&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <h3>Để lại lời nhắn</h3>
        <hr>
        <div class="fb-comments" data-href="<?php echo'http://baohanhthaivinh.zz.mu/#'.$Ma_BH ?>" data-numposts="10" data-colorscheme="light" data-width="100%"></div>
    </div>
</div>
</body>
</html>