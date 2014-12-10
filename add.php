<?php
include 'database.php';
session_start();
if ($_SESSION['username'] == null) header("location:login.php");
//show du lieu

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
        <a class="navbar-brand" href="#">Thái Vinh Computer</a>
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
                    <form class="form-horizontal" method="post" action="add.php">
                        <?php
                        if(isset($_POST['btn1']))
                        {
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
                            list($day, $month, $year) = split('[/.-]', $NgayNhan);
                            $strd = "$year-$month-$day";
                            $date = new DateTime($strd);
                            $time = $date->format("Y-m-d");
                            list($day, $month, $year) = split('[/.-]', $NgayTra);
                            $strd = "$year-$month-$day";
                            $date = new DateTime($strd);
                            $time1 = $date->format("Y-m-d");

                            $sql = "insert into guaranteed(Ten_KH,Email_KH,DienThoai_KH,Ma_KH,Ten_SP,Seri_SP,MaKho_SP,MoTaLoi,NgayNhan_SP,NgayTra_SP,NhanVienSua,TinhTrang,GhiChu) value('$name', '$email', '$SDT', '$MaKH', '$TenSP','$seri','$KhoSP','$MoTaLoi','$time','$time1','$TenNV','$TinhTrang','$GhiChu')";
                            $pdo->query($sql) or die ("khong thêm dk");
                               /* echo "<div class=\"alert alert-danger alert-error\">
                                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
                                    <strong>Lỗi!</strong> Không thể thêm vào cơ sở dữ liệu.
                                </div>";*/


                            $query = "SELECT * FROM guaranteed ORDER BY Ma_BH DESC LIMIT 1";
                            $result = $pdo->query($query) ;
                            $result = $result->fetch();
                            echo "<div class=\"alert alert-success alert-error\">
                                    <a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
                                    <strong>!</strong> Thêm thành công.
                                    <a href='print.php?result=$result[0]' target='_blank'>In bảo hành</a>
                                </div>";
                        }
                        ?>
                        <div class="form-group">
                            <label for="TenKH" class="col-md-4 control-label">Tên khách hàng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="name" id="TenKH" class="form-control"
                                           placeholder="Tên khách hàng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="TenKH" class="col-md-4 control-label">Số điện thoại</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input type="text" name="SDT" id="SDT"  class="form-control"
                                           placeholder="số điện thoại">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="SDT" class="col-md-4 control-label">Email</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mã số khách hàng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="MaKH" id="MaKH" class="form-control"
                                           placeholder="Mã khách hàng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tên sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="TenSP" id="TenSP" class="form-control"
                                           placeholder="Tên sản phẩm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Seri sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-qrcode"></i></span>
                                    <input type="text" name="seri" id="seri" class="form-control"
                                           placeholder="Seri sản phẩm">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mã kho sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-qrcode"></i></span>
                                    <input type="text" name="MaKho" class="form-control" placeholder="Mã kho">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Mô tả về lỗi</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-pencil"></i></span>
                                    <textarea name="msg" class="form-control " rows="4" cols="78"
                                              placeholder="Mô tả về lỗi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ngày nhận sản phẩm</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control" id="dp1" name="NgayNhan" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ngày dự kiến trả</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-calendar"></i></span>
                                    <input type="text" class="form-control" id="dp2" name="NgayTra" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tên nhân viên sửa</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-wrench"></i></span>
                                    <input type="text" class="form-control" id="TenNV" name="TenNV"
                                           placeholder="Tên nhân viên">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Tình trạng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-comment"></i></span>
                                    <input type="text" class="form-control" id="TinhTrang" name="TinhTrang"
                                           placeholder="Tình trạng">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="MaKH" class="col-md-4 control-label">Ghi chú tình trạng</label>
                            <div class="col-md-5">
                                <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="glyphicon glyphicon-pencil"></i></span>
                                    <input type="text" class="form-control" id="GhiChu" name="GhiChu"
                                           placeholder="Ghi chú">
                                </div>
                            </div>
                        </div>
                        <div class="controls pull-left">
                            <button type="submit" title="Thêm mới" id="mybtn" name="btn1" class="btn btn-primary">
                                Thêm mới >>
                            </button>
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
