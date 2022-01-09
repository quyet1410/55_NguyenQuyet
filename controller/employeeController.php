<?php
    require_once 'model/employeeModel.php';
    class employeeController{
        // Điều khiển về mặt logic giữa UserModel và User View
        function index(){
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $empModel = new employeeModel();
            $emps = $empModel->getAllEmps();
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/index.php tương ứng
            require_once 'view/employee/index.php';
        }

        function add(){
            $error = '';
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            if (isset($_POST['btnSave'])){
                $hovaten = $_POST['hovaten'];
                $gioitinh = $_POST['gioitinh'];
                $namsinh = $_POST['namsinh'];
                $nghenghiep = $_POST['nghenghiep'];
                $ngaycapthe = $_POST['ngaycapthe'];
                $ngayhethan = $_POST['ngayhethan'];
                $diachi = $_POST['diachi'];
                if (empty($hovaten)) {
                    $error = "Họ và tên không được để trống";
                }else{
                    $empModel = new EmployeeModel();
                    $empsArr = [
                        'hovaten' => $hovaten,
                        'gioitinh' => $gioitinh,
                        'namsinh' => $namsinh,
                        'nghenghiep' => $nghenghiep,
                        'ngaycapthe' => $ngaycapthe,
                        'ngayhethan' => $ngayhethan,
                        'diachi' => $diachi
                    ];
                    $isInsert = $empModel->AddEmps($empsArr);
                    header("Location: index.php?controller=employee&action=index");
                }
            }
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/add.php tương ứng
            require_once 'view/employee/add.php';
            //header("Location: index.php?controller=employee&action=index");
        }

        function edit(){
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $madg = $_GET['madg'];
            //gọi model để lấy ra đối tượng sách theo id
            $empModel = new employeeModel();
            $emps = $empModel->getBookById($madg);

            //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
            $error = '';
            if (isset($_POST['submit'])) {
                $hovaten = $_POST['hovaten'];
                $gioitinh = $_POST['gioitinh'];
                $namsinh = $_POST['namsinh'];
                $nghenghiep = $_POST['nghenghiep'];
                $ngaycapthe = $_POST['ngaycapthe'];
                $ngayhethan = $_POST['ngayhethan'];
                $diachi = $_POST['diachi'];
                //check validate dữ liệu
                if (empty($ten)) {
                    $error = "Tên không được để trống";
                }
                else {
                    //xử lý update dữ liệu vào hệ thống
                    $empModel = new EmployeeModel();
                    $empsArr = [
                        'hovaten' => $hovaten,
                        'gioitinh' => $gioitinh,
                        'namsinh' => $namsinh,
                        'nghenghiep' => $nghenghiep,
                        'ngaycapthe' => $ngaycapthe,
                        'ngayhethan' => $ngayhethan,
                        'diachi' => $diachi
                    ];
                    $isUpdate = $empModel->UpdateEmps($empsArr);
                    // if ($isUpdate) {
                    //     $_SESSION['success'] = "Update bản ghi #$id thành công";
                    // }
                    // else {
                    //     $_SESSION['error'] = "Update bản ghi #$id thất bại";
                    // }
                    header("Location: index.php?controller=book&action=index");
                }
            }
            //truyền ra view
            require_once 'view/employee/edit.php';
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/edit.php tương ứng
        }

        function delete(){
            $madg = $_GET['madg'];
            if (!is_numeric($madg)){
                header("Location: index.php?controller=employee&action=index");
                exit();
            }
            // Tôi sẽ cần gọi UserModel để truy vấn dữ liệu
            $empModel = new employeeModel();
            $result4 = $empModel->DeleteEmps($madg);
            // Sau khi truy vấn được dữ liệu, tôi sẽ đổ ra UserView/edit.php tương ứng
            // require_once 'view/employee/index.php';
            header("Location: index.php?controller=employee&action=index");
        }
    }



?>