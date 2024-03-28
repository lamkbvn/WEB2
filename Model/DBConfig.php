<?php
class DBConfig
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'web2';

    private $con = NULL;
    private $result = NULL;
    // kết nối csdl
    public function connect()
    {
        $this->con = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if (!$this->con) {
            echo "ket noi that bai";
            exit();
        } else mysqli_set_charset($this->con, 'utf8');
        return $this->con;
    }

    //thực thi câu truy vấn
    public function execute($sql)
    {
        // Check if connection is established
        if (!$this->con) {
            // Attempt to reconnect if connection is not established
            $this->connect();
        }

        // Execute query
        $this->result = $this->con->query($sql);

        return $this->result;
    }

    public function close()
    {
        if ($this->con !== null) {
            $this->con->close();
            $this->con = null;
        }
    }

    //lấy dữ liệu
    public function getData()
    {
        if ($this->result) {
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    //lấy toàn bộ dữ liệu
    public function getAllData()
    {
        if (!$this->result) {
            $data = 0;
        } else {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        }
        return $data;
    }
    // Get the last inserted ID
    public function getLastInsertId()
    {
        return $this->con->insert_id;
    }


    // thêm giỏ hàng
    public function InsertCart($id_user, $id_product, $amount, $status)
    {
        $sql = "INSERT INTO cart (id_user, id_product, amount, status) VALUES ('$id_user', '$id_product', '$amount', '$status')";
        return $this->execute($sql);
    }



    // thêm orrder
    public function InsertOrder($id, $id_user, $hoten, $email, $sdt, $diachi, $note, $date, $totalPrice, $id_discount)
    {
        $sql = "INSERT INTO orders (id, id_user, fullname, email, phone_number, address, note, date_order, total_money, status, id_discount)
            VALUES ('$id', '$id_user', '$hoten', '$email', '$sdt', '$diachi', '$note', '$date', '$totalPrice','1', '$id_discount')";
        return $this->execute($sql);
    }

    // thêm detailOrder
    public function InsertDetailOrder($id_order, $id_pro, $price, $amount, $totalmoney, $dateGo)
    {
        $sql = "INSERT INTO order_detail (id_order, id_product, price, amount, total_money, date_go)
    VALUES ( '$id_order', '$id_pro', '$price', '$amount', '$totalmoney', '$dateGo')";
        return $this->execute($sql);
    }

    // thêm bình luận
    public function InsertCmt($user_id, $product_id, $cmt, $create_at, $num_star)
    {
        $sql = "INSERT INTO feedback (user_id, product_id, note, create_at, num_star)
            VALUES ('$user_id', '$product_id', '$cmt', '$create_at', '$num_star')";
        return $this->execute($sql);
    }

    // phần của admin
    // thêm tour mới
    public function InsertTour($id, $id_cate, $id_user, $id_provin, $title, $price, $content, $datecreate, $acount)
    {
        $sql = "INSERT INTO product (id, id_category, id_user, id_provincial, title, price, content, create_at, num_bought, status, soLuongConLai, star_feedback)
            VALUES ('$id','$id_cate', '$id_user', '$id_provin', '$title', '$price', '$content', '$datecreate', '0', '1', '$acount', '0')";
        return $this->execute($sql);
    }
    // thêm ảnh
    public function InsertImg($id_product, $id_user, $img)
    {
        $sql = "INSERT INTO image_product (id_product, id_user, image) VALUES ('$id_product', '$id_user', '$img')";
        return $this->execute($sql);
    }

    // thêm quyền
    public function InsertRoleLinhDong($idRole, $id_CN, $HD, $name)
    {
        $sql = "INSERT INTO phanquyenlinhdong (id_role, id_chucnang, HD, name) values ('$idRole', '$id_CN', '$HD', '$name')";
        return $this->execute($sql);
    }

    // Xóa bình luận dựa trên ID
    public function deleteComment($commentId)
    {
        $this->connect();

        // Chuẩn bị truy vấn xóa
        $sql = "DELETE FROM feedback WHERE id = $commentId";
        $result = $this->execute($sql);

        return $result;
    }
    public function deleteVoucher($VoucherId)
    {
        $this->connect();

        // Chuẩn bị truy vấn xóa
        $sql = "DELETE FROM discount WHERE id = $VoucherId";
        $result = $this->execute($sql);

        return $result;
    }

    public function updateVoucher($id, $discount_name, $code, $percent, $date_start, $date_end, $description)
    {
        $sql = "UPDATE discount SET discount_name='$discount_name', code='$code', percent='$percent', date_start='$date_start', date_end='$date_end', description='$description' WHERE id='$id'";
        return $this->execute($sql);
    }
    public function insertVoucher($discount_name, $code, $percent, $date_start, $date_end, $description)
    {
        $sql = "INSERT INTO discount ( discount_name,code,percent,date_start,date_end,description) 
            VALUES ( '$discount_name', '$code', '$percent', '$date_start', '$date_end', '$description')";
        return $this->execute($sql);
    }
    // Add this method to your DBConfig class
    public function getVoucherDetailsById($voucherId)
    {
        if ($voucherId > 0) {
            $sql = "SELECT * FROM discount WHERE id = $voucherId";
            $result = $this->execute($sql);

            if ($result && $result->num_rows > 0) {

                $voucherDetails = $result->fetch_assoc();
                return $voucherDetails;
            }
        }
        return false;
    }
}
