<?php
    include("database.php");
    $maKH = $_REQUEST['result'];
    $truyvan = "Select * from guaranteed where Ma_BH = '$maKH'";
    $ketqua = $pdo -> query($truyvan);
    $ketqua = $ketqua -> fetch();
    $NgayNhan = strtotime($ketqua['NgayNhan_SP']);
    $newformat = date('d/m/Y',$NgayNhan);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Xuất phiếu bảo hành</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="2cwebvn" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="faq">
<div class="container" id="content"><!-- END #content   -->

    <table class="table-baocao" style="width: 100%">
        <tr>
            <td rowspan="7" class="col-sm-1" style="width: 30%;text-align: center"><img src="img/thaivinh.png"></td>
            <td class="col-sm-3 title-banner" style="color: #3e8f3e;font-size: 18px;text-align: center;width: 50%">Công ty CP Thương mại máy tính Thái Vinh</td>
        </tr>
        <tr><th>TRUNG TÂM BẢO HÀNH</th></tr>
        <tr><td>Số 30 Khương Thượng,Đống Đa,Hà Nội</td></tr>
        <tr><td>SDT: 043 992 3357 - 0987 060 168</td></tr>
        <tr><td>Website: www.thaivinh.vn Email: thaivinhcomputer@gmail.com </td></tr>
    </table>
    <br/>
    <table class="table-baocao" style="width: 100%" >
        <tr>
            <td class="title-nhapkho">Phiếu nhập kho</td>
        </tr>
    </table><br/><br/>
    <table class="table-thongtin" style="width: 70%; margin-left: 7%">
        <tr>
            <th style="width: 50%"><p>Tên Khách: <?php echo $ketqua['Ten_KH'] ?></p></th>
            <th style="width: 50%;text-align: left"><p>Số phiếu</p></th>
        </tr>
        <tr>
            <th style="width: 50%"><p>Địa chỉ: <?php echo $ketqua['Dic'] ?></p></th>
            <th style="width: 50%;text-align: left"><p>Ngày xuất bán</p></th>
        </tr>
        <tr>
            <th style="width: 50%"><p>Điện thoại: <?php echo $ketqua['DienThoai_KH'] ?></p></th>
            <th style="width: 50%;text-align: left"><p>Số phiếu bán</p></th>
        </tr>
        <tr>
            <th style="width: 50%"><p>Diễn giải</p></th>
            <th style="width: 50%;text-align: left"><p>Ngày nhập kho: <?php echo $newformat ?></p></th>
        </tr>
    </table>
    <table class="table table-chitiet" style="width: 80%; margin-left: 10%;margin-top: 20px" border="thin">
        <tr>
            <th style="width: 10%">STT</th>
            <th style="width: 30%">Model</th>
            <th style="width: 10%">SL</th>
            <th style="width: 20%">Serial</th>
            <th style="width: 30%">Tình trạng</th>
        </tr>
        <tr>
            <td>1</td>
            <td><p><?php echo $ketqua['Ten_SP'] ?></p></td>
            <td>1</td>
            <td><p><?php echo $ketqua['Seri_SP'] ?></p></td>
            <td><p><?php echo $ketqua['TinhTrang'] ?></p></td>
        </tr>
    </table>
    <table style="width: 100%">
        <tr><td><p style="font-size: 14px; margin-left: 10% "><b>Quý khách hàng lưu ý :</b><i>phiếu này chỉ có giá trị trong 30 ngày kể từ ngày xuất phiếu</i></p></td></tr>
    </table><br/>
    <table style="width: 100%">
        <tr><td><p style="margin-right: 15%;float: right">Hà Nội ngày <?php echo $newformat ?></p></td></tr>
    </table><br/>
    <table style="width: 100%">
        <tr>
            <td style="width: 35%; text-align: center"><b>Người giao</b></td>
            <td style="width: 35%; text-align: center"><b>Người nhận</b></td>
            <td style="width: 30%; text-align: center%"><b>Nhân viên bảo hành</b></td>
        </tr>
    </table>
</div><!-- END #content   -->
</body>
</html>