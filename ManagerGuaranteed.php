<?php
include 'database.php';
    session_start();
  if($_SESSION['username']  == null)
        header("location:login.php");
    //show du lieu
    $sql="select * from guaranteed";
    $list = $pdo -> query($sql);
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
        <span class="glyphicon glyphicon-list"></span>   Danh sách bảo hành
        <div class="pull-right">
            <div class="btn-group">
                <a href="add.php" title="Thêm mới" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></a>
            </div>
        </div>
    </div>
<!-- /.panel-heading -->
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th class="col-sm-2">Khách hàng</th>
    <th class="col-sm-2">Số điện thoại</th>
    <th class="col-sm-2">Sản phẩm</th>
    <th class="col-sm-2">Mô tả lỗi</th>
    <th class="col-sm-2">Tình trạng</th>
    <th class="col-sm-2 thaotac text-center">Thao tác</th>
</tr>
</thead>
<tbody>
<?php foreach ($list as $element) {?>
<tr class="even gradeC">
    <td><?php echo $element['Ten_KH'] ?></td>
    <td><?php echo $element['DienThoai_KH'] ?></td>
    <td><?php echo $element['Ten_SP'] ?></td>
    <td class="center"><?php echo $element['MoTaLoi'] ?></td>
    <td class="center"><?php echo $element['TinhTrang'] ?></td>
    <td class="text-center">
        <a href="modify.php?id=<?php echo $element['Ma_BH'] ?>" title="Sửa" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
        <a href="delete.php?id=<?php echo $element['Ma_BH'] ?>" title="Xoá" onclick="return confirm('Bạn muốn xoá sản phẩm này ?');" class="btn btn-danger btn-xs " name="dell"><span class="glyphicon glyphicon-trash"></span></a>
    </td>
</tr>
<?php } ?>
</tbody>
</table>
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
