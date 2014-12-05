<?php
include 'database.php';
$username = $_REQUEST['username'];
$sql = "Delete from account where username='".$username."'";
$pdo -> exec($sql) or die("Khong xoa duoc");
//come back index thế cho chất chơi!
header("location:ManagerUser.php");
?>
