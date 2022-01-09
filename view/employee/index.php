<?php
    require "view/template/header.php";
?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <a class="btn btn-primary" href="index.php?controller=employee&action=add">Thêm người đăng ký</a>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Mã Người đăng ký</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Nhóm nghề nghiệp</th>
                            <th scope="col">Ngày ngày cấp thẻ </th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xoá</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($emps as $row){
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row['madg'];?></th>
                                <td><?php echo $row['hovaten']; ?></td>
                                <td><?php echo $row['gioitinh']; ?></td>
                                <td><?php echo $row['namsinh']; ?></td>
                                <td><?php echo $row['nghenghiep']; ?></td>
                                <td><?php echo $row['ngaycapthe']; ?></td>
                                <td><?php echo $row['ngayhethan']; ?></td>
                                <td><?php echo $row['diachi']; ?></td>
                                <td><a href="index.php?controller=employee&action=edit&id=<?php echo $row['madg']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a href="index.php?controller=employee&action=delete&id=<?php echo $row['madg']; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<?php
    require "view/template/footer.php";
?>