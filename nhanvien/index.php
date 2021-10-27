<?php
    include("include/head.php");
    include ("include/ketnoi.php");
    $rowsPerPage = 4; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    $offset = ($_GET['page'] - 1) * $rowsPerPage;
    $page_hientai = $_GET['page'];
    $sql = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC LIMIT $offset,$rowsPerPage";
    $ketqua = mysqli_query($ketnoi, $sql);

    $sql_sodong = "SELECT * FROM nhanvien a,loai_nv b,phongban c WHERE a.id_loainv=b.id_loainv and a.id_phong = c.id_phong ORDER BY id_nv DESC";
    $ketqua_sodong = mysqli_query($ketnoi, $sql_sodong);
    $sodong = mysqli_num_rows($ketqua_sodong);
    $page = ceil($sodong / $rowsPerPage);

    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        //Xoá thông báo sau khi in ra để tránh lặp đi lặp lại vô lí
    }

?>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar-->
        <?php include('sidebar.php'); ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand-md navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Page Heading -->
                    <div style='width:100%'>
                        <span class="h3 mb-4 text-gray-800">Danh sách nhân viên</span>
<!--                        <div style='float:right'><span-->
<!--                                style='padding-right:20px;color:black'><b>Chào,--><?php //echo $_SESSION['name_user']; ?><!--</b></span><a-->
<!--                                href="../nhanvien/chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng-->
<!--                                    Xuất</button></a></div>-->

                    </div>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->

                <table class="table table-striped table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Giới Tính</th>
                        <th>Địa chỉ</th>
                        <th>Ảnh</th>
                        <th>Loại NV</th>
                        <th>Phòng Ban</th>
                        <th>Chức năng</th>
                    </thead>

                    <?php
                    if (mysqli_num_rows($ketqua) > 0) {
                        while ($row = mysqli_fetch_assoc($ketqua)) {
                            $id        = $row['id_nv'];
                            $ho        = $row['ho_nv'];
                            $ten       = $row['ten_nv'];
                            $gioitinh  = $row['gioitinh_nv'];
                            $ngaysinh  = $row['ns_nv'];
                            $diachi    = $row['diachi_nv'];
                            $anh       = $row['anh_nv'];
                            $loai      = $row['tenloai_nv'];
                            $phong     = $row['tenphong'];
                            ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td width='220px'><?php echo $ho . " " . $ten; ?></td>
                                <td width='100px'><?php echo $ngaysinh; ?></td>
                                <td><?php if ($gioitinh == 0) echo "Nam";
                                    else if ($gioitinh == 1) echo "Nữ";
                                    else echo "Khác"; ?></td>
                                <td width='350px'><?php echo $diachi; ?></td>
                                <td><img src="C:/xampp/htdocs/nhanvien/img/ <?php echo $anh ?>" style='object-fit:cover;border-radius:50%' width='50px' height='50px' /></td>
                                <td><?php echo $loai; ?></td>
                                <td><?php echo $phong; ?></td>
                                <td width="100px"><a href="../nhanvien/edit_nhanvien_form.php?id_nv=<?php echo $id; ?>" style='padding-right:10px;color:green' class="material-icons-outlined">edit</a><a onclick=" return confirm('bạn có chắc muốn xóa không') " href="../nhanvien/chucnang/delete_nv.php?id_nv=<?php echo $id; ?>" style='color:red' class="material-icons-outlined">delete</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
                <div class="container-fluid">
                    <div class='flex-ngang'>
                        <?php if ($page_hientai != 1) { ?>
                            <!-- Trang đầu -->
                            <a style='padding:10px;<?php echo "color:black"; ?>'
                               href="index.php?page=1"><span
                                        class="material-icons">arrow_back_ios</span></a>
                            <!-- Trang trước -->

                            <a style='padding:10px;<?php echo "color:black"; ?>'
                               href="index.php?page=<?php echo $page_hientai - 1; ?>"><span
                                        class="material-icons">chevron_left</span></a>
                        <?php }else{ ?>
                            <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                        class="material-icons">arrow_back_ios</span></a>
                            <!-- Trang trước -->

                            <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                        class="material-icons">chevron_left</span></a>
                        <?php } ?>

                        <!-- Các trang thành phần -->
                        <?php
                        for ($i = 1; $i <= $page; $i++) {
                            ?>
                            <a style='padding:10px;<?php if ($i == $_GET['page']) {
                                echo "color:red";
                            } else echo "color:gray"; ?>'
                               href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php
                        }
                        ?>

                        <!-- Trang sau -->
                        <?php if ($page_hientai != $page) { ?>
                            <a style='padding:10px;<?php echo "color:black"; ?>'
                               href="index.php?page=<?php echo $page_hientai + 1; ?>"><span
                                        class="material-icons">navigate_next</span></a>


                            <!-- Trang cuối    -->
                            <a style='padding:10px;<?php echo "color:black"; ?>'
                               href="index.php?page=<?php echo $page; ?>"><span
                                        class="material-icons">arrow_forward_ios</span></a>
                        <?php }else{ ?>
                            <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                        class="material-icons">navigate_next</span></a>


                            <!-- Trang cuối    -->
                            <a style='padding:10px;<?php echo "color:black"; ?>'><span
                                        class="material-icons">arrow_forward_ios</span></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!--Footer -->
            <?php  include ('footer.php'); ?>
</body>


</html>