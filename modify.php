<?php
    include "database.php";
    $Ma_BH = $_REQUEST['id'];
    $sql = "Select * from guaranteed where Ma_BH = '$Ma_BH'";
    $BaoHanh = $pdo -> query($sql);
    $BaoHanh=$BaoHanh -> fetch();
    $time = strtotime($BaoHanh['NgayNhan_SP']);
    $newformat = date('d/m/Y',$time);
    $date = new DateTime($newformat);
    $result = $date->format('d/m/Y');
    $time1 = strtotime($BaoHanh['NgayTra_SP']);
    $newformat1 = date('d/m/Y',$time1);
    $date1 = new DateTime($newformat1);
    $result1 = $date1->format('d/m/Y');
?>

<?php
    if(isset($_POST['btnSubmit'])){
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
    $time1 = strtotime($NgayTra);
    $newformat = date('Y-m-d',$time1);
     $id = $_REQUEST['id'];
    $sql = "UPDATE guaranteed set Ten_KH='$name',Email_KH='$email',DienThoai_KH='SDT',Ma_KH='$MaKH',Ten_SP='$TenSP',Seri_SP='$seri',MaKho_SP='$KhoSP',MoTaLoi='$MoTaLoi',NgayNhan_SP='FROM_UNIXTIME($time)',NgayTra_SP='FROM_UNIXTIME($time1)',NhanVienSua='$TenNV',TinhTrang='$TinhTrang',GhiChu='$GhiChu' where Ma_BH='$id'";
    $pdo -> query($sql) or die("Không thêm được vào CSDL");
    header("location:ManagerGuaranteed.php");
}
?>
<!DOCTYPE html>
<html>
<head>
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
<div class="well well-sm" style="text-align:center">
    <h3> Bảo Hành Máy tính</h3>
</div>
<div class="container col-sm-10">
    <legend>Cập nhật thông tin bảo hành</legend>
    <form class="myfirstform" action="modify.php?id=<?php echo $Ma_BH ?>" method="post">
        <div class="form-group">
            <label class="control-label">Tên khách hàng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="name" placeholder="Name" value='<?php echo $BaoHanh['Ten_KH'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Số điện thoại</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                    <input type="text" class="form-control" id="SDT" name="SDT" placeholder="SDT" value='<?php echo $BaoHanh['DienThoai_KH'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label">Địa chỉ Email</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value='<?php echo $BaoHanh['Email_KH'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mã số khách hàng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="MaKH" name="MaKH" placeholder="Mã khách hàng" value='<?php echo $BaoHanh['Ma_KH'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tên sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Tên sản phẩm" value='<?php echo $BaoHanh['Ten_SP'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Seri sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                    <input type="text" class="form-control" id="seri" name="seri" placeholder="Seri" value='<?php echo $BaoHanh['Seri_SP'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mã kho sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                    <input type="text" class="form-control" id="KhoSP" name="KhoSP" placeholder="Kho sản phẩm" value='<?php echo $BaoHanh['MaKho_SP'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Mô tả về lỗi</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea name="msg" class="form-control " rows="4" cols="78" placeholder="Mô tả lỗi"><?php echo $BaoHanh['MoTaLoi'] ?></textarea>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ngày nhận sản phẩm</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" id="dp1" name="NgayNhan" placeholder="" value='<?php echo $result ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ngày dự kiến trả</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    <input type="text" class="form-control" id="dp2" name="NgayTra" placeholder="" value='<?php echo $result1 ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tên nhân viên sửa</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                    <input type="text" class="form-control" id="TenNV" name="TenNV" placeholder="Tên nhân viên" value='<?php echo $BaoHanh['NhanVienSua'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Tình trạng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <input type="text" class="form-control" id="TinhTrang" name="TinhTrang" placeholder="Tình trạng" value='<?php echo $BaoHanh['TinhTrang'] ?>'>
                </div>
            </div>
        </div>

        <div class="form-group ">
            <label class="control-label">Ghi chú tình trạng</label>

            <div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <input type="text" class="form-control" id="GhiChu" name="GhiChu" placeholder="Ghi chú" value='<?php echo $BaoHanh['GhiChu'] ?>'>
                </div>
            </div>
        </div>
        <div class="controls pull-left">
            <button type="submit" id="mybtn" name="btnSubmit" class="btn btn-primary">Cập nhật</button>
            <button type="reset" id="mybtn" name="btnhuy" class="btn btn-primary">Huỷ</button>
        </div>

    </form>

</div>
</body>
</html>