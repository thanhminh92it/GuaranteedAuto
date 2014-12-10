<?php
include 'database.php';
session_start();
if($_SESSION['username']  == null)
    header("location:login.php");
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
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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

    <script src="js/respond.min.js"></script>
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
                <h1 class="page-header">Báo cáo bảo hành</h1>

            </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row" style="margin-top:20px">
            <div class="col-lg-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    In báo cáo theo ngày
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <form class="form-horizontal ngaybaocao" role="form" action="printReport.php" method="post" target="_blank">
                                <div class="form-group" style="margin-top: 15px">
                                    <label for="NgayBaoCao" class="col-sm-2 control-label">Ngày báo cáo</label>
                                    <div class="col-sm-10">
                                        <input name="NgayBaoCao" type="text" class="form-control" id="NgayBaoCao" style="width: 200px">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" name="report1" style="margin-left: 17%;margin-bottom: 20px">In báo cáo</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    In báo cáo theo khoảng thời gian
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <form class="form-horizontal khoangngay" role="form" action="printReport.php" method="post" target="_blank">
                                <div class="form-group" style="margin-top: 15px">
                                    <label for="TuNgay" class="col-sm-2 control-label">Từ ngày</label>
                                    <div class="col-sm-10">
                                        <input name="TuNgay" type="text" class="form-control" id="TuNgay" style="width: 200px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="DenNgay" class="col-sm-2 control-label">Đến ngày</label>
                                    <div class="col-sm-10">
                                        <input name="DenNgay" type="text" class="form-control" id="DenNgay" style="width: 200px">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success" name="report2" style="margin-left: 17%;margin-bottom: 20px">In báo cáo</button>
                            </form>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    In toàn bộ báo cáo
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="printReport.php" method="post" target="_blank">
                                    <h4 class="panel-title">
                                        <label for="exampleInputEmail1" style="margin-top:20px;margin-left:20px">In toàn bộ báo cáo</label>
                                    </h4>
                                    <button type="submit" class="btn btn-success" name="report3" style="margin-left: 5%;margin-top:10px;margin-bottom: 20px">In báo cáo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="js/jquery.js">

</script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/locales/bootstrap-datepicker.vi.js"></script>
<script src="js/DatepickerJavaScript.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/plugins/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/sb-admin-2.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/app.js"></script>

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
