<div>
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">STT</th>
        <th class="text-center">Mã sinh viên</th>
        <th class="text-center">Họ Và Tên </th>
        <th class="text-center">Email</th>
        <th class="text-center">Mật khẩu</th>
        <th class="text-center">Số điện thoại</th>
        <th class="text-center">Ngày đăng ký</th>
        <th class="text-center" colspan="2">Thao tác</th>
        </th>

      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * from users where isAdmin=0";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {

    ?>
        <tr>
          <td><?= $count ?></td>
          <td><?= $row["masv"] ?></td>
          <td><?= $row["name"] ?></td>
          <td><?= $row["email"] ?></td>
          <td><?= $row["password"] ?></td>
          <td><?= $row["phone"] ?></td>
          <td><?= $row["registered_at"] ?></td>
          <td>
            <button class="btn btn-primary" style="height:40px;" onclick="edit_user('<?= $row['masv'] ?>')"><i class="bi bi-pencil-square" style="color: aliceblue;"></i></button>
          </td>
          <td>
            <button class="btn btn-danger" style="height:40px" onclick="Delete_user('<?= $row['masv'] ?>')"><i class="bi bi-trash3-fill" style="color: aliceblue;"></i></button>
          </td>

        </tr>
    <?php
        $count = $count + 1;
      }
    }
    ?>
  </table>

   <!-- button add -->
   <button type="button" class="btn btn-success" style="height: 40px;" data-toggle="modal" data-target="#myModal">Thêm tài khoản</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">

    <!-- add sinh viên -->
    <div class=" modal-content container">
      <div class="modal-header row" style="border-bottom: 2px solid #ccc">
        <h4 class="modal-title">Thêm tài khoản</h1>
      </div>

      <form action="./controller/addUserController.php" method="post">
        <div class="row mt-3">
          <div class="col-md-6 mb-3">
            <label for="name" class="form-label">Họ và tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>

          <div class="col-md-6 mb-3">
            <label for="phone" class="form-label">Số điện thoại:</label>
            <input type="number" id="phone" name="phone" class="form-control" required>
          </div>
        </div>

        <button type="submit" name="add_user" class="btn btn-success mb-3" style="height:40px">Lưu</button>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Đóng</button>
      </div>
    </div>
  </div>

</div>