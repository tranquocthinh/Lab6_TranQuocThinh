<?php
    include("../include/chucnang.php");

    $id_nv      = $_POST['id_nv'];
    $ho         = $_POST['ho_nv'];
    $ten        = $_POST['ten_nv'];
    $ngaysinh   = $_POST['ngaysinh_nv'];
    $diachi     = $_POST['diachi_nv'];
    $gioitinh   = $_POST['gioitinh_nv'];
    $loai_nv    = $_POST['loai_nv'];
    $phongban   = $_POST['phongban_nv'];

    update_table('nhanvien','ho_nv',$ho,'id_nv',$id_nv);
    update_table('nhanvien','ten_nv',$ten,'id_nv',$id_nv);
    update_table('nhanvien','ns_nv',$ngaysinh,'id_nv',$id_nv);
    update_table('nhanvien','diachi_nv',$diachi,'id_nv',$id_nv);
    update_table('nhanvien','gioitinh_nv',$gioitinh,'id_nv',$id_nv);
    update_table('nhanvien','id_loainv',$loai_nv,'id_nv',$id_nv);
    update_table('nhanvien','id_phong',$phongban,'id_nv',$id_nv);

    if($_FILES['upload_anh']['name']!="")
    {
        $thumuc = "../img/";
        $file_name = $_FILES["upload_anh"]["name"]; //Tên của file từ máy tính lên web
        $file_path = $thumuc.$file_name;
        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        $name_form = "upload_anh"; //name trong form
        $name_file_anh="$id_nv.$file_type"; //tên sau khi đổi và up lên database

        $name_file1="$id_nv"; //name file không đuôi để up lên server
        upload_image_file($thumuc,$name_form,$name_file1);
        update_table('nhanvien','anh_nv',$name_file_anh,'id_nv',$id_nv);
    }

    header("location: ../index.php?page=1");

?>