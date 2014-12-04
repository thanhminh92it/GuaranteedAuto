<?php
include "database.php";
if(isset($_POST['btn1'])){
    $name = $_POST['name'];
    $SDT = $_POST['SDT'];
    $email = $_POST['email'];
    $MaKH = $_POST['MaKH'];
    $TenSP = $_POST['TenSP'];
    $seri = $_POST['seri'];
    $KhoSP = $_POST['KhoSP'];
    $MoTaLoi = $_POST['msg'];
    $NgayNhan = $_POST['NgayNhan'];
    $NgayTra = $_POST['NgayTra'];
    $TenNV = $_POST['TenNV'];
    $TinhTrang = $_POST['TinhTrang'];
    $GhiChu = $_POST['GhiChu'];
    $time = strtotime($NgayNhan);
    $newformat = date('Y-m-d',$time);
    $time1 = strtotime($NgayNhan);
    $newformat = date('Y-m-d',$time1);

    $sql = "insert into guaranteed(Ten_KH,Email_KH,DienThoai_KH,Ma_KH,Ten_SP,Seri_SP,MaKho_SP,MoTaLoi,NgayNhan_SP,NgayTra_SP,NhanVienSua,TinhTrang,GhiChu) value('$name', '$email', '$SDT', '$MaKH', '$TenSP','$seri','$KhoSP','$MoTaLoi',FROM_UNIXTIME($time),FROM_UNIXTIME($time1),'$TenNV','$TinhTrang','$GhiChu')";
    $pdo -> exec($sql) or die("Không thêm được vào CSDL");
    header("location:ManagerGuaranteed.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm bảo hành</title>
    <meta charset="utf-8"/>
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
</head>
<body>
<div class="well well-sm text-center">
    <h3> Bảo Hành Ô tô</h3>
</div>
<div class="container col-sm-10">
    <legend>Thêm sản phẩm bảo hành</legend>

    <form class="myfirstform" action="add.php" method="post">
        <div class="form-group">
            <label class="control-label">Tên khách hàng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Số điện thoại</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" class="form-control" id="SDT" name="SDT" placeholder="SDT">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Địa chỉ Email</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mã số khách hàng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="MaKH" name="MaKH" placeholder="Mã khách hàng">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tên sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Tên sản phẩm">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Seri sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                    <input type="text" class="form-control" id="seri" name="seri" placeholder="Seri">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mã kho sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                    <input type="text" class="form-control" id="KhoSP" name="KhoSP" placeholder="Kho sản phẩm">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mô tả về lỗi</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea name="msg" class="form-control " rows="4" cols="78"
                              placeholder="Mô tả về lỗi"></textarea>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ngày nhận sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" id="dp1" name="NgayNhan" placeholder="">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ngày dự kiến trả</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" id="dp2" name="NgayTra" placeholder="">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tên nhân viên sửa</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                    <input type="text" class="form-control" id="TenNV" name="TenNV" placeholder="Tên nhân viên">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tình trạng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <input type="text" class="form-control" id="TinhTrang" name="TinhTrang" placeholder="Tình trạng">
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ghi chú tình trạng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <input type="text" class="form-control" id="GhiChu" name="GhiChu" placeholder="Ghi chú">
                </div>
            </div>
        </div>
        <div class="controls pull-left">
            <button type="submit" title="Thêm mới" id="mybtn" name="btn1" class="btn btn-primary">Thêm mới >></button>
        </div>
    </form>

</div>
</body>

</html>