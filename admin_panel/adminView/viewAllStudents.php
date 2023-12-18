<div >
  <h2>Danh sách sinh viên</h2>
  <table class="table ">
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
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from students";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$row["id"]?></td>
      <td><?=$row["masv"]?></td>
      <td><?=$row["hoten"]?></td>
      <td><?=$row["lop"]?></td>
      <td><?=$row["email"]?></td>
      <td><?=$row["ngaysinh"]?></td>
      <td><?=$row["gioitinh"]?></td>
      <td><?=$row["sdt"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>