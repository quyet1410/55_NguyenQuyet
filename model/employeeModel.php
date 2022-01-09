<?php
    require_once 'config/csdl.php';

    class EmployeeModel{
        private $madg;
        private $hovaten;
        private $gioitinh;
        private $namsinh;
        private $nghenghiep;
        private $ngaycapthe;
        private $ngayhethan;
        private $diachi;

        // Định nghĩa các phương thức để sau này nhận các thao tác tương ứng với các action
        public function getAllEmps(){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sql = "SELECT * FROM docgia";
            $result = mysqli_query($conn,$sql);

            // Tôi khai báo biến lưu kết quả trả về (dạng mảng)
            $arr_emps = [];
            // B3. Xử lý và (KO PHẢI SHOW KẾT QUẢ) TRẢ VỀ KẾT QUẢ
            if(mysqli_num_rows($result) > 0){
                // Lấy tất cả dùng mysqli_fetch_all
                $arr_emps = mysqli_fetch_all($result, MYSQLI_ASSOC); //Sử dụng MYSQLI_ASSOC để chỉ định lấy kết quả dạng MẢNG KẾT HỢP
            }

            return $arr_emps;
        }

        public function getBookById($madg = null) {
            $conn = $this->connectDb();
            $querySelect = "SELECT hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi 
            FROM docgia WHERE madg = '$madg'";
            $results = mysqli_query($conn, $querySelect);
            $isSelect = [];
            if (mysqli_num_rows($results) > 0) {
                $isSelect = mysqli_fetch_all($results, MYSQLI_ASSOC);
                $emp = $isSelect[0];
            }
            $this->closeDb($conn);
    
            return $emp;
        }

        public function AddEmps($isEmps = []){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sqlInsert = "INSERT INTO docgia(hovaten, gioitinh, namsinh, nghenghiep, ngaycapthe, ngayhethan, diachi )
            VALUES ('NUll', '{$isEmps['hovaten']}', '{$isEmps['gioitinh']}', '{$isEmps['namsinh']}', '{$isEmps['nghenghiep']}', '{$isEmps['ngaycapthe']}', '{$isEmps['ngayhethan']}','{$isEmps['diachi']}')";
            $isInsert = mysqli_query($conn,$sqlInsert);

            $this->closeDb($conn);

            return $isInsert;
        }

        public function UpdateEmps($upEmps = []){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sqlUpdate = "UPDATE docgia
            SET hovaten = '{$upEmps['hovaten']}', gioitinh = '{$upEmps['gioitinh']}', namsinh = '{$upEmps['namsinh']}', nghenghiep = '{$upEmps['nghenghiep']}', ngaycapthe = '{$upEmps['ngaycapthe']}', ngayhethan = '{$upEmps['ngayhethan']}' ,diachi = '{$upEmps['diachi']}'
            WHERE madg = '{$upEmps['madg']}'";
            $upUpdate = mysqli_query($conn,$sqlUpdate);

            $this->closeDb($conn);

            return $upUpdate;
        }

        public function DeleteEmps($madg = null){
            // B1. Khởi tạo kết nối
            $conn = $this->connectDb();
            // B2. Định nghĩa và thực hiện truy vấn
            $sqlDelete = "DELETE FROM docgia WHERE madg = '$madg'";
            $result4 = mysqli_query($conn,$sqlDelete);

            $this->closeDb($conn);

            return $result4;
        }

        public function connectDb() {
            $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
            if (!$connection) {
                die("Không thể kết nối. Lỗi: " .mysqli_connect_error());
            }
    
            return $connection;
        }
    
        public function closeDb($connection = null) {
            mysqli_close($connection);
        }
    }


?>
