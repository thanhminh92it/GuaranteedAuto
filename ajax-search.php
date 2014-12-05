<?php
/***********************************
 * Tác giả: 2Cwebvn
 * Website : www.2cweb.vn
 ***********************************/
 
//  Include file kết nối Database
include_once ('dbcon.php');

// Kiểm tra dữ liệu đầu vào có tồn tại hay không
if(isset($_GET['keyword'])){		
    $keyword = 	trim($_GET['keyword']) ;		// Cắt bỏ khoảng trắng
	$keyword = mysqli_real_escape_string($dbc, $keyword);	// Lọc các ký tự đặc biệt

	// Câu query lấy dữ liệu
	$query = "select * from guaranteed where DienThoai_KH like '%$keyword%' or Ten_KH like '%$keyword%'";

	// Kết nối Database, thực hiện câu truy vấn
	$result = mysqli_query($dbc,$query);

	// Kiểm tra kết quả trả về có hay không ?
	if($result){
		// Kiểm tra có dòng record nào hay không?
		if(mysqli_affected_rows($dbc)!=0){  
			// Hiển thị dữ liệu
			while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $time = strtotime($row['NgayNhan_SP']);
                $newformat = date('d/m/Y',$time);
                $time1 = strtotime($row['NgayTra_SP']);
                $newformat1 = date('d/m/Y',$time1);
			echo '<p class="title"> <a href="detail.php?id='.$row['Ma_BH'].'" target="_blank" ><b>Khách hàng: '.$row['Ten_KH'].' - '.$row['DienThoai_KH'].'</b></a>
			<br>Sản phẩm: '.$row['Ten_SP'].' - Lỗi: '.$row['MoTaLoi'].'
			<br>Ngày nhận: '.$newformat.' - Ngày dự kiến trả: '.$newformat1.'</p>'   ;
		}
		}else {
			echo 'Không có kết quả nào cho từ khóa :"'.$_GET['keyword'].'"';
		}
	}
	}else {
		echo 'Không có từ khóa nào được gởi đến.';
	}
?>