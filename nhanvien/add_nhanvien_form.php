
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
                <form action="chucnang/add_nhanvien.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Họ</label>
                        <input type="text" id="ho_nv" name="ho_nv" class="form-control" placeholder="" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" id="ten_nv" name="ten_nv" class="form-control" placeholder="" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input id="ngaysinh_nv" name="ngaysinh_nv"  rows="2" class="form-control"
                                  placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select class='font-lato-heavy color-black form-select w-100' id="gioitinh_nv" name='gioitinh_nv' required>
                            <option value="" disabled selected>Chọn giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" id="diachi_nv" name="diachi_nv" class="form-control" placeholder="" autofocus required>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input class='font-lato-heavy color-black' type="file" id='upload_anh' name='upload_anh' placeholder="Ảnh đại diện của bạn..." accept="image/png, image/jpeg, image/jpg" required />
                    </div>
                    <div class="form-group">
                        <label>Loại nhân viên</label>
                        <select class='font-lato-heavy color-black form-select w-100' id='loai_nv' name='loai_nv' required>
                            <option value="" disabled selected>Loại nhân viên</option>
                            <?php
                            if (mysqli_num_rows($loai_nv) > 0) {
                                while ($row = mysqli_fetch_assoc($loai_nv)) {
                                    $id         = $row['id_loainv'];
                                    $tenloai    = $row['tenloai_nv'];
                                    echo "<option value='$id'>$id - $tenloai</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại phòng ban</label>
                        <select class='font-lato-heavy color-black form-select w-100' id='phongban_nv' name='phongban_nv' required>
                            <option value="" disabled selected>Loại phòng ban</option>
                            <?php
                            if (mysqli_num_rows($phongban) > 0) {
                                while ($row = mysqli_fetch_assoc($phongban)) {
                                    $id         = $row['id_phong'];
                                    $tenphong   = $row['tenphong'];
                                    echo "<option value='$id'>$id - $tenphong</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <button class='w-100 btn' style='background-color:rgb(117, 114, 179);color:white' type='submit'>Thêm nhân
                        viên</button>
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