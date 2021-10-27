<?php
include("../include/chucnang.php");
if(isset($_POST['phongbannv']))
{
    $tenphong = $_POST['phongbannv'];
    $table          = 'phongban';
    $col            = ['tenphong'];
    $value          = [$tenphong];
    insert_table($table,$col,$value);

    $_SESSION['message']='<div class="alert alert-success" role="alert">
  Bạn đã thêm bài hát thành công
  </div>';
    header('Location: ../index.php');
}
?>