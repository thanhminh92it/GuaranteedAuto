<?php
include 'database.php';
$id = $_REQUEST['id'];
$sql = "Delete from guaranteed where Ma_BH='$id'";
$pdo -> exec($sql) or die("Khong xoa duoc");
//come back index thế cho chất chơi!
header("location:ManagerGuaranteed.php");
?>
