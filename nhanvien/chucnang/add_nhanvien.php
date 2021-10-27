<?php
include("../include/chucnang.php");


$sql = "SELECT MAX(id_nv) as id_max FROM nhanvien";
$ketqua = mysqli_query($ketnoi,$sql);
if(mysqli_num_rows($ketqua)>0)
{
    $row = mysqli_fetch_assoc($ketqua);
    $id_max = $row['id_max'];
    $id_max = $id_max + 1;
}
else
{
    $id_max = 1;
}

if(isset($_POST['ho_nv'])&&isset($_POST['ten_nv'])&&isset($_POST['gioitinh_nv'])&&isset($_POST['ngaysinh_nv'])&&isset($_POST['loai_nv'])&&isset($_POST['phongban_nv'])&&isset($_POST['diachi_nv'])&&isset($_FILES['upload_anh']))
{
    $ho_nv          = $_POST['ho_nv'];
    $ten_nv         = $_POST['ten_nv'];
    $gioitinh_nv    = $_POST['gioitinh_nv'];
    $diachi_nv      = $_POST['diachi_nv'];
    $ngaysinh_nv    = $_POST['ngaysinh_nv'];
    $loai_nv        = $_POST['loai_nv'];
    $phongban_nv    = $_POST['phongban_nv'];

    $thumuc         = "C:/xampp/htdocs/nhanvien/img/";
    $file_name      = $_FILES["upload_anh"]["name"];
    $file_path      = $thumuc.$file_name;
    $file_type      = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    $anh_nv         = "$id_max.$file_type";
    $table          = 'nhanvien';
    $col            = ['ho_nv','ten_nv','ns_nv','gioitinh_nv','diachi_nv','anh_nv','id_loainv','id_phong'];
    $value          = [$ho_nv,$ten_nv,$ngaysinh_nv,$gioitinh_nv,$diachi_nv,$anh_nv,$loai_nv,$phongban_nv];
    insert_table($table,$col,$value);
    upload_image_file($thumuc,"upload_anh",$id_max);

    header('Location: index.php');
    $_SESSION['message']='<div class="alert alert-success" role="alert">
  Bạn đã thêm bài hát thành công
  </div>';
}
?>