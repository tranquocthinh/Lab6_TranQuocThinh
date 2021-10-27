<?php
include("../include/chucnang.php");

$id=$_GET['id_nv'];
//$sql="DELETE FROM nhanvien WHERE id='$id' ";
$sql="DELETE FROM `nhanvien` WHERE `nhanvien`.`id_nv` = $id";
mysqli_query($ketnoi,$sql);

header("location: http://localhost/nhanvien/index.php?page=1");

?>