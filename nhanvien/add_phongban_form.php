
<!DOCTYPE html>
<html lang="en">

<!-- Head Tag -->
<?php
include ("include/head.php");
include ("include/ketnoi.php");
$sql = "SELECT * FROM loai_nv";
$loai_nv = mysqli_query($ketnoi, $sql);
$sql = "SELECT * FROM phongban";
$phongban = mysqli_query($ketnoi, $sql);
?>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- include sidebar-->
    <?php include('sidebar.php'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column w-100">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Page Heading -->
                <div style='width:50%'>
                    <span class="h3 mb-4 text-gray-800">Thêm Nhạc Mới</span>
                    <!--                    <div style='float:right'><span style='padding-right:20px;color:black'><b>Chào,--><?php //echo $_SESSION['name_user']; ?><!--</b></span><a href="../chucnang/xuly_logout_admin.php"><button class='btn btn-warning'>Đăng Xuất</button></a></div>-->
                </div>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <form action="chucnang/add_phongban.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên phòng ban</label>
                        <input type="text" id="phongbannv" name="phongbannv" class="form-control" placeholder="" autofocus required>
                    </div>
                    <button class='w-100 btn' style='background-color:rgb(117, 114, 179);color:white' type='submit'>Thêm phòng ban</button>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.container-fluid -->
        <?php  include ('footer.php'); ?>
    </div>
    <!-- End of Main Content -->
    <!--Footer -->

</div>

</body>
</html>