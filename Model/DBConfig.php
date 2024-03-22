<?php 
    class DBConfig{
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'web2';

        private $con = NULL;
        private $result = NULL;
        // kết nối csdl
        public function connect(){
            $this->con = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            if(!$this->con){
                echo "ket noi that bai";
                exit();
            } else mysqli_set_charset($this->con, 'utf8');
            return $this->con;
        }
        public function close() {
            if ($this->con !== null) {
                $this->con->close();
                $this->con = null;
            }
        }

        //thực thi câu truy vấn
        public function execute($sql){
            $this->result = $this->con->query($sql);
            // if (!$this->result) {
            //     // Nếu câu truy vấn không thành công, in ra thông báo lỗi
            //     echo "Lỗi: " . mysqli_error($this->con);
            // }
            return $this->result;
        }

        //lấy dữ liệu
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            } else {
                $data = 0;
            }
            return $data;
        }

        //lấy toàn bộ dữ liệu
        public function getAllData(){
            if(!$this->result){
                $data = 0;
            } else {
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $data;
        }

        // thêm giỏ hàng
        public function InsertCart($id_user, $id_product, $amount, $status){
            $sql = "INSERT INTO cart (id_user, id_product, amount, status) VALUES ('$id_user', '$id_product', '$amount', '$status')";
            return $this->execute($sql);
        }

        // thêm orrder
        public function InsertOrder($id, $id_user, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, $id_discount){
            $sql = "INSERT INTO orders (id, id_user, fullname, email, phone_number, address, note, date_order, total_money, status, id_discount)
            VALUES ('$id', '$id_user', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1', '$id_discount')";
            return $this->execute($sql);
        }

        // thêm detailOrder
        public function InsertDetailOrder($id_user, $id_pro, $price, $amount, $totalmoney, $dateGo){
            $sql = "INSERT INTO order_detail (id_order, id_product, price, amount, total_money, date_go)
            VALUES ( '$id_user', '$id_pro', '$price', '$amount', '$totalmoney', '$dateGo')";
            return $this->execute($sql);
        }

        // thêm bình luận
        public function InsertCmt($user_id, $product_id, $cmt, $create_at, $num_star){
            $sql = "INSERT INTO feedback (user_id, product_id, note, create_at, num_star)
            VALUES ('$user_id', '$product_id', '$cmt', '$create_at', '$num_star')";
            return $this->execute($sql);
        }

        // phần của admin
        // thêm tour mới
        public function InsertTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $address, $datecreate, $acount){
            $sql = "INSERT INTO product (id, id_category, id_user, id_provincial, title, price, content, create_at, num_bought, status, address, soLuongConLai, star_feedback)
            VALUES ('$id','$id_cate', '$id_user', '$id_provin', '$title', '$price', '$content', '$datecreate', '0', '1', '$address', '$acount', '0')";
            return $this->execute($sql);
        }
        // thêm ảnh
        public function InsertImg($id_product, $id_user, $img){
            $sql = "INSERT INTO image_product (id_product, id_user, image) VALUES ('$id_product', '$id_user', '$img')";
            return $this->execute($sql);
        }

        // thêm quyền
        public function InsertRole($name){
            $sql = "INSERT INTO role (decription) VALUES ('$name')";
            return $this->execute($sql);
        }
        public function InsertRoleLinhDong($id_CN, $HD){
            $selectId = "SELECT id FROM role ORDER BY id DESC LIMIT 1";
            $result = $this->execute($selectId);
            $row = $result->fetch_assoc();
            $last_role_id = $row["id"];
            $sql = "INSERT INTO phanquyenlinhdong (id_role, id_chucNang, HD) values ('$last_role_id', '$id_CN', '$HD')";
            return $this->execute($sql);
        }
    }


?>