<div>
  <h2>Danh sách sinh viên</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Mã sinh viên</th>
        <th class="text-center">Họ và Tên</th>
        <th class="text-center">Lớp</th>
        <th class="text-center">Email</th>
        <th class="text-center">Ngày sinh</th>
        <th class="text-center">Giới tính</th>
        <th class="text-center">SĐT</th>
        <th class="text-center" colspan="2">Chức năng</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from students";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $row["id"] ?></td>
          <td><?= $row["masv"] ?></td>
          <td><?= $row["hoten"] ?></td>
          <td><?= $row["lop"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["ngaysinh"] ?></td>
          <td><?= $row["gioitinh"] == 1 ? "Nữ" : ($row['gioitinh'] == 0 ? "Nam" : "Không xác định") ?></td>
          <td><?= $row["sdt"] ?></td>
          <td>
            <button class="btn btn-primary" style="height:40px;" onclick="edit_student('<?= $row['id'] ?>')"><i class="bi bi-pencil-square" style="color: aliceblue;"></i></button>
          </td>
          <td>
            <button class="btn btn-danger" style="height:40px" onclick="Delete_student('<?= $row['id'] ?>')"><i class="bi bi-trash3-fill" style="color: aliceblue;"></i></button>
          </td>
        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
    <!--Search-->
    <div class="row justify-content-end">
      <div class="col-md-6 mb-3 mt-3">
        <form method="post" class="d-flex" id="search-form">
          <div class="input-group">
            <input type="text" class="form-control" name="noidung" placeholder="Tìm kiếm..." style="margin-right: 8px; border-radius: 5px;" aria-label="Search" aria-describedby="search-button">
            <button class="btn btn-outline-success" type="submit" style="height: 40px;" id="search-button" name="search">Tìm kiếm</button>
          </div>
        </form>
      </div>
    </div>
    
  </table>
  <!-- button add -->
  <button type="button" class="btn btn-success" style="height: 40px;" data-toggle="modal" data-target="#myModal">Thêm sinh viên</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- add sinh viên -->
      <div class=" modal-content container">
        <div class="modal-header row" style="border-bottom: 2px solid #ccc">
          <h4 class="modal-title">Thêm sinh viên</h1>
        </div>

        <form action="./controller/addStudentController.php" method="post">
          <div class="row mt-3">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Mã sinh viên:</label>
              <input type="text" id="masv" name="masv" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Họ và tên:</label>
              <input type="text" id="hoten" name="hoten" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Lớp:</label>
              <input type="text" id="lop" name="lop" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3 ">
              <label for="dateofbirth" class="form-label">Ngày sinh</label>
              <?php
              $currentDate = date('Y-m-d');
              ?>
              <input type="date" id="ngaysinh" name="ngaysinh" class="form-control" max="<?php echo $currentDate; ?>" required>
            </div>
            <div class="col-md-6 mb-3 ">
              <label for="phonenumber" class="form-label">Số điện thoại</label>
              <input type="number" id="sdt" name="sdt" class="form-control" required>
            </div>
          </div>

          <label class="form-check-label">Giới tính:</label>
          <div class="row p-3">
            <div class="form-check col-md-2">
              <input type="radio" id="gioitinh" name="gioitinh" value="0" class="form-check-input">
              <label for="gioitinh" class="form-check-label">Nam</label>
            </div>
            <div class="form-check col-md-2">
              <input type="radio" id="gioitinh" name="gioitinh" value="1" class="form-check-input">
              <label for="gioitinh" class="form-check-label">Nữ</label>
            </div>
            <div class="form-check col-md-2">
              <input type="radio" id="gioitinh" name="gioitinh" value="2" class="form-check-input">
              <label for="gioitinh" class="form-check-label">Khác</label>
            </div>
          </div>

          <button type="submit" name="add_student" class="btn btn-success mb-3" style="height:40px">Lưu</button>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Đóng</button>
        </div>
      </div>
    </div>

  </div>