<?php
include("../include/chucnang.php");
if(isset($_POST['tenloai']))
{
    $tenloai = $_POST['tenloai'];
    $table          = 'loai_nv';
    $col            = ['tenloai_nv'];
    $value          = [$tenloai];
    insert_table($table,$col,$value);

    $_SESSION['message']='<div class="alert alert-success" role="alert">
  Bạn đã thêm bài hát thành công
  </div>';
    header('Location: ../index.php');
}
?>