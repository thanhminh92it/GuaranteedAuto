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
    $time1 = strtotime($NgayTra);
    $id = $_REQUEST['id'];
    $sql = "UPDATE guaranteed set Ten_KH='$name',Email_KH='$email',DienThoai_KH='$SDT',Ma_KH='$MaKH',Ten_SP='$TenSP',Seri_SP='$seri',MaKho_SP='$KhoSP',MoTaLoi='$MoTaLoi',NgayNhan_SP=FROM_UNIXTIME($time),NgayTra_SP=FROM_UNIXTIME($time1),NhanVienSua='$TenNV',TinhTrang='$TinhTrang',GhiChu='$GhiChu' where Ma_BH='$id'";
    $pdo -> query($sql) or die("Không thêm được vào CSDL");
    header("location:ManagerGuaranteed.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý bảo hành</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css" type="text/css"/>
    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>

    <![endif]-->

</head>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Thái Vinh Computer</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $_SESSION['username']; ?></a></li>
                <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i>Thoát</a></li>
            </ul>
        </li>
    </ul>
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a class="active" href="ManagerGuaranteed.php"><i class="fa fa-table fa-fw"></i> Danh sách bảo hành</a>
                </li>
                <li>
                    <a href="ManagerUser.php"><i class="fa fa-edit fa-fw"></i> Quản lý tài khoản</a>
                </li>
            </ul>
        </div>

    </div>

</nav>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bảo hành</h1>

        </div>

        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!--<p>Bảng danh sách bảo hành</p>
                <div class="pull-right"></div>-->
                <div class="panel-heading panel-mytitle">
                    <span class="glyphicon glyphicon-list"></span> Danh sách bảo hành
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="/GuaranteedAuto/add.php" title="Thêm mới" class="btn btn-primary btn-xs"><span
                                    class="glyphicon glyphicon-plus"></span></a>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="modify.php?id=<?php echo $Ma_BH ?>">
                        <div class="form-group">
                            <label for="TenKH" class="col-md-4 control-label">Tên khách hàng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value='<?php echo $BaoHanh['Ten_KH'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TenKH" class="col-md-4 control-label">Số điện thoại</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input type="text" class="form-control" id="SDT" name="SDT" placeholder="SDT" value='<?php echo $BaoHanh['DienThoai_KH'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SDT" class="col-md-4 control-label">Email</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value='<?php echo $BaoHanh['Email_KH'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mã số khách hàng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="MaKH" name="MaKH" placeholder="Mã khách hàng" value='<?php echo $BaoHanh['Ma_KH'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tên sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" class="form-control" id="TenSP" name="TenSP" placeholder="Tên sản phẩm" value='<?php echo $BaoHanh['Ten_SP'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Seri sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                                    <input type="text" class="form-control" id="seri" name="seri" placeholder="Seri" value='<?php echo $BaoHanh['Seri_SP'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mã kho sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-hdd"></i></span>
                                    <input type="text" class="form-control" id="KhoSP" name="KhoSP" placeholder="Kho sản phẩm" value='<?php echo $BaoHanh['MaKho_SP'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mô tả về lỗi</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <textarea name="msg" class="form-control " rows="4" cols="78" placeholder="Mô tả lỗi"><?php echo $BaoHanh['MoTaLoi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ngày nhận sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control" id="dp1" name="NgayNhan" placeholder="" value='<?php echo $result ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ngày dự kiến trả</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control" id="dp2" name="NgayTra" placeholder="" value='<?php echo $result1 ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tên nhân viên sửa</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                                    <input type="text" class="form-control" id="TenNV" name="TenNV" placeholder="Tên nhân viên" value='<?php echo $BaoHanh['NhanVienSua'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tình trạng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                                    <input type="text" class="form-control" id="TinhTrang" name="TinhTrang" placeholder="Tình trạng" value='<?php echo $BaoHanh['TinhTrang'] ?>'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ghi chú tình trạng</label>
                            <div class="col-md-5">
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
            </div>
        </div>
    </div>

</div>

</div>
<!-- /#wrapper -->

<!-- jQuery -->

<script src="js/jquery.js"></script>
<script src = "js/respond.min.js" ></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.vi.js"></script>
<script src="js/DatepickerJavaScript.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/app.js"></script>
<script src = "js/bootstrap.min.js" ></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
        $(".thaotac").removeClass("sorting");
        $(".thaotac").removeClass("sorting_asc");
        $(".thaotac").removeClass("sorting_desc");
    });
</script>

</body>

</html>
