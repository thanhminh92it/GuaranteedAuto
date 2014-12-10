<?php
    include("database.php");
    if(isset($_POST['report3'])){
        $sql="select * from guaranteed";
        $result = $pdo -> query($sql);
        $title = "Toàn bộ bảo hành:";
        $die = "Không có bảo hành nào trong ngày này";
    }
    else{
        if(isset($_POST['report2'])){
            $TuNgay = $_POST['TuNgay'];
            $DenNgay = $_POST['DenNgay'];
            list($day, $month, $year) = split('[/.-]', $TuNgay);
            $strd = "$year-$month-$day";
            $date = new DateTime($strd);
            $time = $date->format("Y-m-d");
            list($day, $month, $year) = split('[/.-]', $DenNgay);
            $strd = "$year-$month-$day";
            $date = new DateTime($strd);
            $time2 = $date->format("Y-m-d");
            $sql="select * from guaranteed where NgayNhan_SP BETWEEN CAST('$time' AS DATE) AND CAST('$time2' AS DATE)";
            $result = $pdo -> query($sql);
            $title = "Bảo hành trong khoảng: ". "" .$TuNgay ."  -->   "."".$DenNgay;
            $die = "Không có bảo hành nào trong thời gian này";
        }
        else{
            if(isset($_POST['report1'])){
                $NgayBaoCao = $_POST['NgayBaoCao'];

                list($day, $month, $year) = split('[/.-]', $NgayBaoCao);
                $strd = "$year-$month-$day";
                $date = new DateTime($strd);
                $time = $date->format("Y-m-d");
                $sql="select * from guaranteed where NgayNhan_SP = '$time'";
                $result = $pdo -> query($sql);
                $title = "Bảo hành trong ngày: ". "" .$NgayBaoCao;
                $die = "Không có bảo hành nào trong ngày: "."".$NgayBaoCao;
            }
        }
    }
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chi tiết báo cáo</title>
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
    <table class="table-baocao" style="width: 100%; margin-top:20px" >
        <tr>
            <td class="title-nhapkho">Báo cáo bảo hành</td>
        </tr>
    </table><br/><br/>

    <?php
        $count = 0;
        foreach($result as $child) $count++;
        if($count == 0) echo "<div style=\" margin-left:10%\"><p style=\"font-size: 18px\"><strong>$die</strong></p></div>";
        else{
            echo "<div style=\" margin-left:10%\"><p style=\"font-size: 18px\"><strong>$title</strong></p></div>";
            echo "<table class=\"table-baocao-chitiet\" id=\"dataTables-example\"  style=\"\">
        <thead>
        <tr>
            <th class=\"col-sm-2\">Khách hàng</th>
            <th class=\"col-sm-2\">Số điện thoại</th>
            <th class=\"col-sm-2\">Sản phẩm</th>
            <th class=\"col-sm-2\">Mô tả lỗi</th>
            <th class=\"col-sm-2\">Tình trạng</th>
        </tr>
        </thead>
        <tbody>";
            include("database.php");
            if(isset($_POST['report3'])){
                $sql="select * from guaranteed";
                $result = $pdo -> query($sql);
                $title = "Toàn bộ bảo hành:";
                $die = "Không có bảo hành nào trong ngày này";
            }
            else{
                if(isset($_POST['report2'])){
                    $TuNgay = $_POST['TuNgay'];
                    $DenNgay = $_POST['DenNgay'];
                    list($day, $month, $year) = split('[/.-]', $TuNgay);
                    $strd = "$year-$month-$day";
                    $date = new DateTime($strd);
                    $time = $date->format("Y-m-d");
                    list($day, $month, $year) = split('[/.-]', $DenNgay);
                    $strd = "$year-$month-$day";
                    $date = new DateTime($strd);
                    $time2 = $date->format("Y-m-d");
                    $sql="select * from guaranteed where NgayNhan_SP BETWEEN CAST('$time' AS DATE) AND CAST('$time2' AS DATE)";
                    $result = $pdo -> query($sql);
                    $title = "Bảo hành trong khoảng: ". "" .$TuNgay ."  -->   "."".$DenNgay;
                    $die = "Không có bảo hành nào trong thời gian này";
                }
                else{
                    if(isset($_POST['report1'])){
                        $NgayBaoCao = $_POST['NgayBaoCao'];
                        list($day, $month, $year) = split('[/.-]', $NgayBaoCao);
                        $strd = "$year-$month-$day";
                        $date = new DateTime($strd);
                        $time = $date->format("Y-m-d");
                        $sql="select * from guaranteed where NgayNhan_SP = '$time'";
                        $result = $pdo -> query($sql);

                    }
                }
            }
            foreach($result as $element){
                echo "<tr class=\"even gradeC\"><td>".$element['Ten_KH']."</td><td>".$element['DienThoai_KH']."</td>
                <td>".$element['Ten_SP']."</td>
                <td class=\"center\">".$element['MoTaLoi']."</td>
                <td class=\"center\">".$element['TinhTrang']."</td>
            </tr>";
            }
            echo "</tbody></table>";
        }
    ?>
    <br/>
    <table style="width: 100%">
        <tr><td><p style="margin-right: 20%;float: right">Hà Nội ngày   ....../....../......</td></tr>
    </table><br/>
    <table style="width: 100%">
        <tr>
            <td style="width: 65%"></td>
            <td style="width: 35%; text-align: left"><b>Nhân viên báo cáo</b></td>
        </tr>
    </table>
</div>


</body>
</html>